@extends('layouts.client')
@section('content')
    <main class="main">
        <div class="container">
            {{-- <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="cart.html">Shopping Cart</a>
            </li>
            <li>
                <a href="checkout.html">Checkout</a>
            </li>
            <li class="disabled">
                <a href="cart.html">Order Complete</a>
            </li>
        </ul> --}}
            <div align="center" class="m-5">
                <h3>GIỎ HÀNG</h3>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (Session::has('user'))

                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('updateCart') }}" method="post">
                            @csrf
                            <div class="cart-table-container">
                                <table class="table table-cart">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="thumbnail-col">Ảnh</th>
                                            <th class="product-col">Tên sản phẩm</th>
                                            <th class="price-col">Giá</th>
                                            <th class="qty-col">Số lượng</th>
                                            <th class="text-right">Tổng giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($carts) > 0)
                                            @foreach ($carts as $item)
                                                <tr class="product-row">
                                                    <td>
                                                        <a href="{{ route('deleteCart', $item->idCart) }}">Xóa</a>
                                                    </td>
                                                    <td>
                                                        <figure class="product-image-container">
                                                            <a href="product.html" class="product-image">
                                                                <img width="80"
                                                                    src="{{ asset('images/' . $item->img) }}"
                                                                    alt="product">
                                                            </a>
                                                        </figure>
                                                    </td>
                                                    <td class="product-col">
                                                        <h5 class="product-title">
                                                            <a href="#" class="text-muted">{{ $item->name }}</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ number_format($item->price, '0', ',', '.') }}đ</td>
                                                    <td>
                                                        <div class="product-single-qty">
                                                            <input class="horizontal-quantity form-control" type="text"
                                                                name="quantity" value="{{ $item->quantityProductCart }}">
                                                        </div><!-- End .product-single-qty -->
                                                    </td>
                                                    <td class="text-right"><span
                                                            class="subtotal-price">@php
                                                                $total = $item->price * $item->quantityProductCart;
                                                                echo number_format($total, '0', ',', '.');
                                                            @endphp</span>đ
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="product-row">
                                                <td colspan="6" align="center">Giỏ hàng của bạn trống</td>
                                            </tr>
                                        @endif
                                    </tbody>


                                    <tfoot>
                                        <tr>
                                            <td colspan="6" class="clearfix">
                                                <div class="float-left">
                                                    <div class="cart-discount">
                                                        {{-- <form action="#" method="POST">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm"
                                                                placeholder="Nhập voucher giảm giá" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-sm" type="submit">Áp dụng</button>
                                                            </div>
                                                        </div>
                                                    </form> --}}
                                                        <p>Nếu bạn thay đổi số lượng vui lòng bấm Cập nhật giỏ hàng để cập
                                                            nhật số lượng và giá cho bạn</p>
                                                    </div>
                                                </div><!-- End .float-left -->


                                                <div class="float-right">

                                                    <button type="submit" class="btn btn-shop btn-update-cart">
                                                        Cập nhật giỏ
                                                    </button>
                                                </div><!-- End .float-right -->
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- End .cart-table-container -->
                        </form>
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary border p-5">
                            <h4>CART TOTALS</h4>

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Tổng tiền:</td>
                                        <td>{{ number_format($totalPrice, '0', ',', '.') }}đ</td>
                                    </tr>

                                    <tr>
                                        {{-- <td colspan="2" class="text-left">
                                        <h4>Shipping</h4>

                                        <div class="form-group form-group-custom-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="radio" checked>
                                                <label class="custom-control-label">Local pickup</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-group -->

                                        <div class="form-group form-group-custom-control mb-0">
                                            <div class="custom-control custom-radio mb-0">
                                                <input type="radio" name="radio" class="custom-control-input">
                                                <label class="custom-control-label">Flat rate</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-group -->

                                        <form action="#">
                                            <div class="form-group form-group-sm">
                                                <label>Shipping to <strong>NY.</strong></label>
                                                <div class="select-custom">
                                                    <select class="form-control form-control-sm">
                                                        <option value="USA">United States (US)</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="China">China</option>
                                                        <option value="Germany">Germany</option>
                                                    </select>
                                                </div><!-- End .select-custom -->
                                            </div><!-- End .form-group -->

                                            <div class="form-group form-group-sm">
                                                <div class="select-custom">
                                                    <select class="form-control form-control-sm">
                                                        <option value="NY">New York</option>
                                                        <option value="CA">California</option>
                                                        <option value="TX">Texas</option>
                                                    </select>
                                                </div><!-- End .select-custom -->
                                            </div><!-- End .form-group -->

                                            <div class="form-group form-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Town / City">
                                            </div><!-- End .form-group -->

                                            <div class="form-group form-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="ZIP">
                                            </div><!-- End .form-group -->

                                            <button type="submit" class="btn btn-shop btn-update-total">
                                                Update Totals
                                            </button>
                                        </form>
                                    </td> --}}
                                    </tr>
                                </tbody>

                                <tfoot>
                                    {{-- <tr>
                                    <td>Total</td>
                                    <td>$17.90</td>
                                </tr> --}}
                                </tfoot>
                            </table><br>
                            @if (count($carts) > 0)
                                <div class="checkout-methods">
                                    <a href="{{ route('checkout') }}" class="btn btn-block btn-dark">Tiến hành thanh toán
                                        <i class="fa fa-arrow-right"></i></a>
                                </div>
                            @endif
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            @else
                <p>Bạn cần đăng nhập để sử dụng giỏ hàng</p>
            @endif
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
