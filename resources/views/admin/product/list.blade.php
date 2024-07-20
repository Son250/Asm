@extends('layouts.admin')
@section('content')
    <style>
        .description-cell small {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }
    </style>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 pl-3 text-gray-800 mb-3">Danh sách sản phẩm</h1>
        @if (session('status'))
            <div class="alert alert-warning">
                {{ session('status') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-secondary btn-sm">Chọn tất cả</button>
                <button class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
                <button class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
                <a href="{{ url('admin/product/add') }}"><button class="btn btn-secondary btn-sm">Nhập thêm</button></a>
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
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                                <th>Danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td width='150px'>{{ $item->name }}</td>
                                    <td>
                                        <img width="100px" src="{{ asset('images/' . $item->img) }}" alt="">

                                    </td>
                                    <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                    <td class="description-cell"><small>{{ $item->description }}</small> </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->categoryName }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('edit', $item->id) }}">Sửa</a>
                                        <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')"
                                            href="{{ route('deleteProduct', $item->id) }}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pl-3">
                {{ $products->links() }}
            </div>
            
        </div>

    </div>
@endsection
