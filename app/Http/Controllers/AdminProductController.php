<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    //
    function list()
    {
        $products = DB::table('products')
            ->select('products.*', 'categories.name as categoryName')
            ->join('categories', 'products.iddm', '=', 'categories.id')
            ->paginate(10);
        return view('admin.product.list', compact('products'));
    }
    function add()
    {
        $categories = DB::table('categories')->get();
        return view('admin.product.add', compact('categories'));
    }
    function edit($id)
    {
        $categories = DB::table('categories')->get();
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.product.edit', compact('product', 'categories'));
    }
    function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return back()->with('status', 'Bạn đã xóa sản phẩm thành công!');
    }
    function store(Request $request)
    {

        if ($request->hasFile('img')) {
            $imageName = time() . '-' . $request->img->getClientOriginalName();
            $request->img->move(public_path('images'), $imageName);
        } else {
            $imageName = "Null";
        }

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'iddm' => $request->iddm,
            'img' => $imageName,
        ]);
        return redirect('admin/product/list')->with('status', 'Bạn đã thêm sản phẩm thành công');
    }
    function storeUpdate(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if ($request->hasFile('img')) {
            $imageName = time() . '-' . $request->img->getClientOriginalName();
            $request->img->move(public_path('images'), $imageName);
        } else {
            $imageName = $product->img;
        }

        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'iddm' => $request->iddm,
            'img' => $imageName,
        ]);

        return redirect('admin/product/list')->with('status', 'Bạn đã sửa sp thành công');
    }
}
