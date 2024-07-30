<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBannerController extends Controller
{
    //
    function list()
    {
        $banners = DB::table('banners')->paginate(5);
        return view('admin.banner.list', compact('banners'));
    }
    function add()
    {
        return view('admin.banner.add');
    }
    function storeAdd(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
        }

        DB::table('banners')->insert([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);
        return redirect('admin/banner/list')->with('status', 'Bạn đã thêm banner thành công !');
    }
    function editBanner($id)
    {
        $banner = DB::table('banners')->where('id', $id)->first();
        return view('admin.banner.edit', compact('banner'));
    }

    function storeUpdate(Request $request, $id)
    {
        $banner = DB::table('banners')->where('id', $id)->first();

        if ($request->hasFile('image')) {
            $imageName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $banner->image;
        }

        DB::table('banners')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);

        return redirect('admin/banner/list')->with('status', 'Bạn đã cập nhật banner thành công !');
    }
    function deleteBanner($id)
    {
        DB::table('banners')->where('id', $id)->delete();
        return redirect('admin/banner/list')->with('status', 'Bạn đã xóa banner thành công !');
    }
}
