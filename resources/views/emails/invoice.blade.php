{{-- @extends('layouts.admin')
@section('content') --}}
<!-- Begin Page Content -->

<!-- /.container-fluid -->
{{-- @endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            max-width: 660px;
            margin: 0px auto;
            padding: 0px;
            border: 2px solid black;
            padding: 10px;
        }

        .nguoi-mua-hang {
            padding-left: 25px;
            margin-bottom: 100px;
        }

        .ky-ten {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
 
    <div class="container">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4" align="center">
                <h1 class="h3 mb-0 text-gray-800">HÓA ĐƠN GIÁ TRỊ GIA TĂNG </h1>

            </div>
            <div class="card shadow mb-4">
                <div class="card-body">

                    {{-- <form action="{{ route('updateOrder', $order->id) }}" method="post" enctype="multipart/form-data"> --}}
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
                    <p><strong>Khách hàng :</strong> {{ $order->shipping_address }}</p>
                    <p><strong>Phương thức thanh toán :</strong> {{ $order->payment_method }}</p>
                    <p><strong>Trạng thái:</strong> {{ $order->status }}</p>

                    <table border="1" style="margin: 00px">
                        <thead>
                            <tr style="height: 50px">
                                <th>STT</th>
                                <th>Tên hàng hóa</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $i => $item)
                                <tr align="center" style="height: 50px">
                                    <td align="center">{{ $i + 1 }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td style="padding: 0px 20px">{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                    <td style="padding: 0px 25px">
                                        {{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <p><strong>Ngày đặt:</strong> {{ $order->order_date }}</p>
                    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }}đ</p>
                    <div class="ky-ten">
                        <div>
                            <p class="nguoi-mua-hang"><strong>Người mua hàng</strong> <br> <span><i>(Kí, ghi rõ họ
                                        tên)</i></span></p>
                        </div>
                        <div>
                            <p><strong>Cửa hàng Sơn Anna Mobile</strong></p>
                            <span style="padding-left: 50px"><i>SơnAnna</i></span> <br> <br>
                            <span style="padding-left: 30px"><i>Nguyễn Viết Sơn</i></span>
                        </div>
                    </div>

                    {{-- <button class="btn btn-success" onclick="window.print()" name="btnSubmit">In hóa đơn</button> --}}
                    {{-- </form> --}}
                </div>
            </div>


        </div>
    </div>
</body>

</html>
