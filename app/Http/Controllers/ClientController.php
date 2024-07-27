<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ClientController extends Controller
{
    //
    // public $user = Session::get('user');
    function home()
    {
        $products = DB::table('products')
            ->select('products.*', 'categories.name as categoryName')
            ->join('categories', 'products.iddm', '=', 'categories.id')
            ->limit(6)
            ->get();
        $categories = DB::table('categories')->get();
        return view('client.home', compact('products', 'categories'));
    }
    function category($id)
    {
        // dd('Đã đi vào hàm category');
        $products = DB::table('products')->where('iddm', $id)->get();
        return view('client.category', compact('products'));
    }

    function detailProduct($id)
    {
        $product = DB::table('products')->where('products.id', $id)
            ->select('products.*', 'categories.name as categoryName')
            ->join('categories', 'products.iddm', '=', 'categories.id')->first();
        $iddm = $product->iddm;
        $productCategory = DB::table('products')->where('products.iddm', $iddm)->get();
        return view('client.detailProduct', compact('product', 'productCategory'));
    }
    function addToCart(Request $request, $id)
    {
        $user = Session::get('user');
        DB::table('carts')->insert([
            'user_id' => $user->id,
            'product_id' => $id,
            'quantity' => $request->input('quantity'),

        ]);
        return back()->with('status', 'Bạn đã thêm vào giỏ hàng thành công !');
    }
    function cart()
    {
        $user = Session::get('user');
        $carts = DB::table('carts')->where('user_id', $user->id)
            ->select('carts.*', 'products.*', 'carts.quantity as quantityProductCart', 'carts.id as idCart')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->get();
        $totalPrice = $carts->reduce(function ($carry, $item) {
            return $carry + $item->price * $item->quantityProductCart;
        }, 0);
        return view('client.cart', compact('carts', 'totalPrice'));
    }

    function checkout(Request $request)
    {
        $user = Session::get('user');
        $carts = DB::table('carts')->where('user_id', $user->id)
            ->select('carts.*', 'products.*', 'carts.quantity as quantityProductCart', 'carts.id as idCart')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->get();
        $totalPrice = $carts->reduce(function ($carry, $item) {
            return $carry + $item->price * $item->quantityProductCart;
        }, 0);
        return view('client.checkout', compact('carts', 'totalPrice'));
    }

    function deleteCart($id)
    {
        $user = Session::get('user');
        DB::table('carts')
            ->where('user_id', $user->id)
            ->where('id', $id)
            ->delete();
        return back()->with('status', 'Bạn đã xóa thành công !');
    }
    function checkoutStore(Request $request)
    {
        // dd('Đã đi vào hàm checkout store');
        $user = Session::get('user');
        $carts = DB::table('carts')->where('user_id', $user->id)
            ->select('carts.*', 'products.*', 'carts.quantity as quantityProductCart', 'carts.id as idCart')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->get();
        $totalPrice = $carts->reduce(function ($carry, $item) {
            return $carry + $item->price * $item->quantityProductCart;
        }, 0);
        // if ($request->input('btnSubmit')) {

        $shipping_address = $request->input('fullname') . ' - ' . $request->input('email') . ' - ' . $request->input('phone') . ' - ' .  $request->input('address') . ' - ' . $request->input('note');
       
        $todayDate = Carbon::now()->format('Y-m-d H:i:s');
        $payment_method = $request->input('payment-method');

        if ($request->input('payment-method') == "COD") {

            DB::table('orders')->insert([
                'product_quantity' => count($carts),
                'total_amount' => $totalPrice,
                'order_date' => $todayDate,
                'payment_method' => $payment_method,
                'shipping_address' => $shipping_address,
                'status' => 'Chờ xác nhận',
                'customer_id' => $user->id,
            ]);

            // Lấy đơn hàng mới nhất
            $latestOrder = DB::table('orders')->orderBy('order_date', 'desc')->first();
            // dd($latestOrder);

            // Lưu chi tiết đơn hàng
            foreach ($carts as $item) {
                DB::table('order_items')->insert([
                    'order_id' => $latestOrder->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantityProductCart,
                    'price' => $item->price,
                ]);
            }

            DB::table('carts')
                ->where('user_id', $user->id)
                ->delete();
            return redirect('cart')->with('status', 'Bạn đã đặt hàng thành công!');
        } else {
            return redirect('checkout')->with('status', 'Vui lòng chọn phương thức thanh toán !');
        }
    }
    // }
}
