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
    function update(Request $request, $id)
    {

        $order = Order::findOrFail($id);

        $statuses = [
            1 => 'Chờ xác nhận',
            2 => 'Đã xác nhận',
            3 => 'Đang giao hàng',
            4 => 'Hoàn thành',
            5 => 'Hủy đơn'
        ];
        $currentStatus = array_search($order->status, $statuses);     //trạng thái cũ
        $newStatus = (int) $request->input('status');       //trạng thái mới

        // Kiểm tra điều kiện 
        if ($newStatus <  $currentStatus) {
            return redirect()->back()->with('error', 'Không thể chuyển trạng thái đơn hàng quay trở lại !');
        } else {
            Order::where('id', $id)->update([
                'status' => $request->status
            ]);
        }

        return redirect('admin/order/list')->with('status', 'Bạn đã cập nhật thành công !');
    }
    function deleteOrder($id)
    {
        Order::where('id', $id)->delete();
        return redirect('admin/order/list')->with('status', 'Bạn đã xóa thành công !');
    }
    function showOrder(Request $request, $id)
    {
        $status_order = [
            1 => 'Chờ xác nhận',
            2 => 'Đã xác nhận',
            3 => 'Đang giao hàng',
            4 => 'Hoàn thành',
            5 => 'Hủy đơn'
        ];

        $order = Order::with('orderItems')->findOrFail($id);

        return view('admin.order.show', compact('order', 'status_order'));
    }
}
