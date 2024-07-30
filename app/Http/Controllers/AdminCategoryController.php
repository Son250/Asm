<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    //
    function list()
    {
        $categories = DB::table('categories')->get();
        return view('admin.category.list', compact('categories'));
    }
    function add()
    {
        return view('admin.category.add');
    }
    function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:50',
        ]);
        DB::table('categories')->insert([
            'name' => $request->name,
        ]);
        return redirect('admin/category/list')->with('status', 'Bạn đã thêm danh mục thành công');
    }
    function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }
    function delete($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return back()->with('status', 'Bạn đã xóa thành công!');
    }
    function storeUpdate(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:50',
        ]);
        DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect('admin/category/list')->with('status', 'Bạn đã sửa thành công');
    }
}
