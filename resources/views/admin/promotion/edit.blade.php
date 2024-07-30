@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 pl-3 mb-0 text-gray-800">Sửa khuyến mại</h1>
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
                <a href="{{ url('admin/promotion/list') }}" class="btn btn-primary">Danh sách</a>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('storeUpdate', $promotion->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Mã CODE</label>
                                <input type="text" class="form-control" name="code" value="{{ $promotion->code }}">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Tên mã</label>
                                <input type="text" class="form-control" name="title" value="{{ $promotion->title }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" name="description" value="{{ $promotion->description }}">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Số tiền giảm giá</label>
                        <input type="text" class="form-control" name="discount_amount"
                            value="{{ $promotion->discount_amount }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="start_date"
                                    value="{{ $promotion->start_date }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="end_date"
                                    value="{{ $promotion->end_date }}">
                            </div>
                        </div>
                    </div>



                    <button class="btn btn-success" type="submit" name="btnSubmit">Gửi</button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
