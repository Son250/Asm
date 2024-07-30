@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 pl-3 mb-0 text-gray-800">Thêm mới banner</h1>
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
                <a href="{{ url('admin/banner/list') }}" class="btn btn-primary">Danh sách</a>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ url('admin/banner/storeAdd') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Tên banner</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Trạng thái hoạt động</label>
                        {{-- <input type="text" class="form-control" name="quantity"> --}}
                        <select name="is_active" id="" class="form-control">
                            <option value="0">Chọn</option>
                            <option value="false">Tắt</option>
                            <option value="true" selected>Bật</option>
                        </select>
                    </div>

                    <button class="btn btn-success" type="submit" name="btnSubmit">Gửi</button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
