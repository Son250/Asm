@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sửa sản phẩm</h1>
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('storeUpdateProduct', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="form-label">Hình ảnh</label> <br>
                        <img width="100px" src="{{ asset('images/' . $product->img) }}" alt="">
                        <input type="file" class="form-control" name="img">
                        @error('img')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="form-label">Giá</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="" class="form-label">Số lượng</label>
                        <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                    <div>
                        <label for="" class="form-label">Danh mục</label>
                        <select name="iddm" id="" class="form-control">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @if ($product->iddm == $item->id) selected @endif>
                                    {{ $item->name }}</option>
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
