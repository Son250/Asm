<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPromotionController extends Controller
{
    //
    function list()
    {
        $promotions = DB::table('promotions')->paginate(5);
        return view('admin.promotion.list', compact('promotions'));
    }
    function add()
    {
        return view('admin.promotion.add');
    }
    function storeAdd(Request $request)
    {
        DB::table('promotions')->insert([
            'code' => $request->code,
            'title' => $request->title,
            'description' => $request->description,
            'discount_amount' => $request->discount_amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect('admin/promotion/list')->with('status', 'Bạn đã thêm thành công !');
    }
    function edit($id)
    {
        $promotion = DB::table('promotions')->where('id', $id)->first();
        return view('admin.promotion.edit', compact('promotion'));
    }
    function storeUpdate(Request $request, $id)
    {
        DB::table('promotions')->where('id', $id)->update([
            'code' => $request->code,
            'title' => $request->title,
            'description' => $request->description,
            'discount_amount' => $request->discount_amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect('admin/promotion/list')->with('status', 'Bạn đã sửa thành công !');
    }
    function deletePromotion($id)
    {
        DB::table('promotions')->where('id', $id)->delete();
        return redirect('admin/promotion/list')->with('status', 'Bạn đã xóa thành công !');
    }
}
