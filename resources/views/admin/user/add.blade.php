@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm mới thành viên</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" method="post" class="form">
                   
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="hovaten" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" required id="hovaten" name="fullname"
                                placeholder="Nhập họ và tên...">
                        </div>
                        <div class="col-md-6">
                            <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" required id="tendangnhap" name="user"
                                placeholder="Nhập tên đăng nhập...">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="matkhau" class="form-label">Mật Khẩu</label>
                            <input type="password" class="form-control" required id="matkhau" name="pass"
                                placeholder="Nhập mật khẩu...">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Nhập email...">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="sodienthoai" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" required id="sodienthoai" name="tel"
                                placeholder="Nhập số điện thoại...">
                        </div>
                        <div class="col-md-6">
                            <label for="diachi" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" required id="diachi" name="address"
                                placeholder="Nhập địa chỉ...">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="sel1">Vai Trò</label>
                            <select class="form-control" id="sel1" name="role">
                                <option value="2">Thành viên</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="btnSubmit" class="btn btn-success">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
