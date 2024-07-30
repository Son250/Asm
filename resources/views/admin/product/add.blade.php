@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 pl-3 mb-0 text-gray-800">Thêm mới sản phẩm</h1>
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
                <a href="{{ url('admin/product/list') }}" class="btn btn-primary">Danh sách</a>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ url('admin/product/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" name="img">
                        @error('img')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Giá</label>
                        <input type="text" class="form-control" name="price">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" name="description">
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Số lượng</label>
                        <input type="text" class="form-control" name="quantity">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Danh mục</label>
                        <select name="iddm" id="" class="form-control">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                        @error('iddm')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-success" type="submit" name="btnSubmit">Gửi</button>
                </form>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
