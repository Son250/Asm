@extends('layouts.client')

@section('content')
    <main class="main">
        <div class="page-header">
            <div class="container d-flex flex-column align-items-center">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="demo4.html">Trang chủ</a></li>
                            {{-- <li class="breadcrumb-item"><a href="category.html">Shop</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">
                                Tài khoản
                            </li>
                        </ol>
                    </div>
                </nav>

                <h1>Tài khoản</h1>
            </div>
        </div>

        <div class="container login-container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading mb-1">
                                <h2 class="title">Đăng nhập</h2>
                            </div>

                            <form action="{{ route('loginStore') }}" method="POST">
                                @csrf
                                @if (session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <label for="login-email">
                                    Email
                                    <span class="required">*</span>
                                </label>
                                <input type="email" name="email" class="form-input form-wide" placeholder="Nhập địa chỉ email" id="login-email"
                                    required />

                                <label for="login-password">
                                    Mật khẩu
                                    <span class="required">*</span>
                                </label>
                                <input type="password" name="password" class="form-input form-wide" placeholder="Nhập mật khẩu" id="login-password"
                                    required />

                                <div class="form-footer">
                                    <div class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" id="lost-password" />
                                        <label class="custom-control-label mb-0" for="lost-password">Ghi nhớ tài khoản</label>
                                    </div>

                                    <a href="#"
                                        class="forget-password text-dark form-footer-right">Quên mật khẩu?</a>
                                </div>
                                <button type="submit" class="btn btn-dark btn-md w-100">
                                    ĐĂNG NHẬP
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="heading mb-1">
                                <h2 class="title">Đăng ký</h2>
                            </div>

                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                @if (session('register'))
                                    <div class="alert alert-success">
                                        {{ session('register') }}
                                    </div>
                                @endif
                                <label for="register-email">
                                    Họ và tên
                                    <span class="required">*</span>
                                </label>
                                <input type="text" name="name" class="form-input form-wide" placeholder="Nhập họ và tên" id="register-email"
                                    required />

                                <label for="register-email">
                                    Địa chỉ email
                                    <span class="required">*</span>
                                </label>
                                <input type="email" name="email" class="form-input form-wide" placeholder="Nhập địa chỉ email" id="register-email"
                                    required />

                                <label for="register-password">
                                    Mật khẩu
                                    <span class="required">*</span>
                                </label>
                                <input type="password" name="password" class="form-input form-wide" placeholder="Nhập mật khẩu" id="register-password"
                                    required />

                                <div class="form-footer mb-2">
                                    <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                        Đăng ký
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End .main -->
@endsection
