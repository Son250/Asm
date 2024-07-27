<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    //
    function list()
    {
        $orders = DB::table('orders')->paginate(10);
        return view('admin.order.list', compact('orders'));
    }
    function edit(Request $request, $id)
    {
        // $orderItem = DB::table('order_items')
        //     ->select('orders.*', 'products.*')
        //     ->join('orders', 'orders.id', '=', 'order_items.order_id')
        //     ->join('products', 'products.id', '=', 'order_items.product_id')
        //     ->where('order_items.order_id', $id)
        //     ->get();
        $status_order = [
            1 => 'Chờ xác nhận',
            2 => 'Đã xác nhận',
            3 => 'Đang giao hàng',
            4 => 'Hoàn thành',
            5 => 'Hủy đơn'
        ];
        // $order = Order::with('orderItems')->find($id);
        $order = Order::with('orderItems')->findOrFail($id);
        // dd($order);
        return view('admin.order.edit', compact('order', 'status_order'));
    }
}
