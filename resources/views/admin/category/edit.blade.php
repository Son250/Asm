@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 pl-3 mb-0 text-gray-800">Sửa danh mục</h1>
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
                <a href="{{ url('admin/category/list') }}" class="btn btn-primary">Danh sách</a>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('storeUpdateCategory', $category->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục..."
                            value="{{ $category->name }}">
                    </div>

                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </form>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
