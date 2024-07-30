@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thay đổi trạng thái </h1>
           
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('updateOrder', $order->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
                    <p><strong>Khách hàng :</strong> {{ $order->shipping_address }}</p>
                    <p><strong>Phương thức thanh toán :</strong> {{ $order->payment_method }}</p>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="" class="text-primary"><b>Trạng thái:</b> </label> <br>
                            <select name="status" id="" class="form-control">
                                @foreach ($status_order as $item)
                                    <option value="{{ $loop->iteration }}"
                                        @if ($item == $order->status) selected @endif>{{ $item }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <ul>
                        @foreach ($order->orderItems as $item)
                            <li>
                                <p><strong>Sản phẩm:</strong> {{ $item->product->name }}</p>
                                <p><strong>Số lượng:</strong> {{ $item->quantity }}</p>
                                <p><strong>Giá:</strong> {{ number_format($item->price, 0, ',', '.') }}đ</p>
                            </li>
                        @endforeach
                    </ul>
                    <p><strong>Ngày đặt:</strong> {{ $order->order_date }}</p>
                    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }}đ</p>




                    <button class="btn btn-success" type="submit" name="btnSubmit">Gửi</button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
