@extends('layouts.admin')
@section('content')
    <style>
        .password-cell {
            max-width: 60px;
            /* Đặt chiều rộng tối đa */
            white-space: nowrap;
            /* Không cho văn bản xuống dòng */
            overflow: hidden;
            /* Ẩn phần văn bản tràn ra ngoài */
            text-overflow: ellipsis;
            /* Thêm dấu ... cho văn bản tràn */
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách tài khoản</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-secondary btn-sm">Chọn tất cả</button>
                <button class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
                <button class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
                {{-- <a href="?act=addnguoidung"><button class="btn btn-secondary btn-sm">Nhập thêm</button></a> --}}
                <form action="" class="float-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="search">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>

                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                {{-- <th>Số điện thoại</th> --}}
                                <th>Vai trò</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $item)
                                <tr>
                                    <td class="align-middle text-center td_id">{{ $i + 1 }}</td>
                                    {{-- <td class="col-1 align-middle">{{ $item->name }}</td> --}}
                                    <td class="fullname col-1 align-middle" style="width:100px">{{ $item->name }}</td>
                                    <td class="col-1 align-middle">{{ $item->email }}</td>
                                    <td class="col-1 align-middle" class="password-cell">
                                        <small>{{ $item->password }}</small>
                                    </td>
                                    {{-- <td class="col-1 align-middle">0987654321</td> --}}
                                    <td class="col-2 align-middle">
                                        {{ $item->role }}</td>
                                    <td class="col-2 align-middle text-center">
                                        <a href="{{ route('deleteUser', $item->id) }}"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa không ?')"
                                            class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
