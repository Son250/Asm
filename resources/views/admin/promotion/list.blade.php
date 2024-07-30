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
        <h1 class="h3 pl-3 text-gray-800 mb-3">Danh sách khuyến mại</h1>
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
                <a href="{{ url('admin/promotion/add') }}"><button class="btn btn-secondary btn-sm">Nhập thêm</button></a>
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
                                <th>Mã CODE</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Số tiền được giảm</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotions as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>

                                    <td>{{ number_format($item->discount_amount, 0, ',', '.') }}đ</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('editPromotion', $item->id) }}">Sửa</a>
                                        <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')"
                                            href="{{ route('deletePromotion', $item->id) }}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pl-3">
                {{ $promotions->links() }}
            </div>

        </div>

    </div>
@endsection
