<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    function login()
    {
        return view('client.account.login');
    }
    function loginStore(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            // dd(Session::get('user'));
            return redirect('home');
        }
        return back()->with('status', 'Email hoặc mật khẩu không đúng!');
    }
    function register(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'User',
            'password' => Hash::make($request->password),
        ]);
        return redirect('login')->with('register', 'Đăng ký tài khoản thành công!');
    }
    public function logout()
    {
        Session::forget('user');
        return redirect('home');
    }
    function dashbroad()
    {
        return view('client.account.dashbroad');
    }
}
