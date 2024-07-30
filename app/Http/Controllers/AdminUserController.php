<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    //
    function list()
    {
        $users = DB::table('users')->get();
        return view('admin.user.list', compact('users'));
    }
    function add()
    {
        return view('admin.user.add');
    }
    function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('admin/user/list')->with('status', 'Bạn đã xóa thành công !');
    }
}
