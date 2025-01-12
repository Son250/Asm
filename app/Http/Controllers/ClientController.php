<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use App\Mail\InvoiceMail;
use App\Order;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
        $productsNew = DB::table('products')->select('products.*', 'categories.name as categoryName')
            ->join('categories', 'products.iddm', '=', 'categories.id')
            ->limit(6)->latest('products.id')->get();
        // dd($productsNew);
        $categories = DB::table('categories')->get();
        return view('client.home', compact('products', 'categories', 'productsNew'));
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
        // return back()->with('status', 'Bạn đã thêm vào giỏ hàng thành công !');
        return redirect('cart');
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

    function updateCart(Request $request)
    {
        $user = Session::get('user');
        DB::table('carts')->where('user_id', $user->id)->update([
            'quantity' => $request->quantity,
        ]);
        return redirect('cart')->with('status', 'Cập nhật giỏ hàng thành công');
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
    function buyNow(Request $request, $id)
    {
        $user = Session::get('user');
        $productBuyNow = DB::table('products')->where('id', $id)->first();

        // dd($product);
        // $totalPrice = $product->price;
        return view('client.checkout', compact('productBuyNow'));
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

    //Áp mã giảm giá
    function applyPromotion(Request $request)
    {
        $user = Session::get('user');
        $carts = DB::table('carts')->where('user_id', $user->id)
            ->select('carts.*', 'products.*', 'carts.quantity as quantityProductCart', 'carts.id as idCart')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->get();
        $totalPrice = $carts->reduce(function ($carry, $item) {
            return $carry + $item->price * $item->quantityProductCart;
        }, 0);


        //áp mã giảm giá
        $promotion = DB::table('promotions')->where('code', $request->ma_code)->first();
        // dd($promotion);
        $todayDate = Carbon::now();
        if ($promotion) {
            if ($todayDate->between($promotion->start_date, $promotion->end_date)) {
                return view('client.checkout', compact('carts', 'totalPrice', 'promotion'))->with('status', 'Áp dụng mã giảm giá thành công');
            } else {
                return back()->with('status', 'Mã giảm giá không tồn tại hoặc đã hết hạn');
            }
        } else {
            return back()->with('status', 'Mã giảm giá không tồn tại hoặc đã hết hạn');
        }
    }
    // function applyPromotionBuyNow(Request $request, $id)
    // {
    //     $user = Session::get('user');
    //     // $carts = DB::table('carts')->where('user_id', $user->id)
    //     //     ->select('carts.*', 'products.*', 'carts.quantity as quantityProductCart', 'carts.id as idCart')
    //     //     ->join('products', 'carts.product_id', '=', 'products.id')
    //     //     ->get();
    //     // $totalPrice = $carts->reduce(function ($carry, $item) {
    //     //     return $carry + $item->price * $item->quantityProductCart;
    //     // }, 0);

    //     $productBuyNow = DB::table('products')->where('id', $id)->first();



    //     //áp mã giảm giá
    //     $promotion = DB::table('promotions')->where('code', $request->ma_code)->first();
    //     // dd($promotion);
    //     $todayDate = Carbon::now();
    //     if ($promotion) {
    //         if ($todayDate->between($promotion->start_date, $promotion->end_date)) {
    //             return view('client.checkout', compact('promotion', 'productBuyNow'))->with('status', 'Áp dụng mã giảm giá thành công');
    //         } else {
    //             return back()->with('status', 'Mã giảm giá không tồn tại hoặc đã hết hạn');
    //         }
    //     } else {
    //         return back()->with('status', 'Mã giảm giá không tồn tại hoặc đã hết hạn');
    //     }
    // }


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

        //Nếu tồn tại mã giảm giá
        if ($request->input('applyPromotion')) {
            $totalPrice = $request->input('applyPromotion');
        }


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


            // Xử lý gửi mail hóa đơn
            try {
                // Tìm đơn hàng vừa tạo
                $order = Order::with('orderItems')->findOrFail($latestOrder->id);

                // Gửi email
                Mail::to($request->input('email'))->send(new InvoiceMail($order));
            } catch (\Exception $e) {
                // Ghi log lỗi gửi mail
                Log::error('Không thể gửi mail hóa đơn: ' . $e->getMessage());
            }

            // Trả về thông báo đặt hàng thành công
            return redirect('cart')->with('status', 'Bạn đã đặt hàng thành công!');
        } else if ($request->input('payment-method') == "ONLINE") {
            $data = $request->all();

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
            $vnp_TmnCode = "0F5SFEKL"; //Mã website tại VNPAY 
            $vnp_HashSecret = "2WI7O0VUDU0T6DNFER322YK480ETBVAR"; //Chuỗi bí mật

            $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Nội dung thanh toán';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount =
                $totalPrice * 100;
            $vnp_Locale = "vn";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            );
            if (isset($_POST['btnSubmit'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
        } else {
            return redirect('checkout')->with('status', 'Vui lòng chọn phương thức thanh toán !');
        }
    }



    function buyNowStore(Request $request, $id)
    {

        $user = Session::get('user');
        $productBuyNow = DB::table('products')->where('id', $id)->first();

        $totalPrice = $productBuyNow->price;
        //Nếu tồn tại mã giảm giá
        if ($request->input('applyPromotion')) {
            $totalPrice = $request->input('applyPromotion');
        }


        // if ($request->input('btnSubmit')) {
        $shipping_address = $request->input('fullname') . ' - ' . $request->input('email') . ' - ' . $request->input('phone') . ' - ' .  $request->input('address') . ' - ' . $request->input('note');

        $todayDate = Carbon::now()->format('Y-m-d H:i:s');
        $payment_method = $request->input('payment-method');

        if ($request->input('payment-method') == "COD") {

            DB::table('orders')->insert([
                'product_quantity' => 1,
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

            DB::table('order_items')->insert([
                'order_id' => $latestOrder->id,
                'product_id' => $id,
                'quantity' => 1,
                'price' => $totalPrice,
            ]);

            // Xử lý gửi mail hóa đơn
            try {
                // Tìm đơn hàng vừa tạo
                $order = Order::with('orderItems')->findOrFail($latestOrder->id);

                // Gửi email
                Mail::to($request->input('email'))->send(new InvoiceMail($order));
            } catch (\Exception $e) {
                // Ghi log lỗi gửi mail
                Log::error('Không thể gửi mail hóa đơn: ' . $e->getMessage());
            }

            // Trả về thông báo đặt hàng thành công
            return redirect('cart')->with('status', 'Bạn đã đặt hàng thành công!');
        } else if ($request->input('payment-method') == "ONLINE") {
            $data = $request->all();

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
            $vnp_TmnCode = "0F5SFEKL"; //Mã website tại VNPAY 
            $vnp_HashSecret = "2WI7O0VUDU0T6DNFER322YK480ETBVAR"; //Chuỗi bí mật

            $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Nội dung thanh toán';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount =
                $totalPrice * 100;
            $vnp_Locale = "vn";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            );
            if (isset($_POST['btnSubmit'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
        } else {
            return redirect('checkout')->with('status', 'Vui lòng chọn phương thức thanh toán !');
        }
    }
}
