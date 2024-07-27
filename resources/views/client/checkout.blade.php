@extends('layouts.client')
@section('content')
    <style>
        label {
            font-weight: 300;
            color: black;
            font-size: 15px;
        }
    </style>
    <main class="main main-test">
        <div class="container checkout-container">

            <div align="center" class="m-5">
                <h3>THANH TOÁN</h3>
            </div>

            <div class="login-form-container">
                <div id="collapseOne" class="collapse">
                    <div class="login-section feature-box">
                        <div class="feature-box-content">
                            <form action="#" id="login-form">
                                <p>
                                    If you have shopped with us before, please enter your details below. If you are a new
                                    customer, please proceed to the Billing & Shipping section.
                                </p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-0 pb-1">Username or email <span
                                                    class="required">*</span></label>
                                            <input type="email" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-0 pb-1">Password <span class="required">*</span></label>
                                            <input type="password" class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn">LOGIN</button>

                                <div class="form-footer mb-1">
                                    <div class="custom-control custom-checkbox mb-0 mt-0">
                                        <input type="checkbox" class="custom-control-input" id="lost-password" />
                                        <label class="custom-control-label mb-0" for="lost-password">Remember
                                            me</label>
                                    </div>

                                    <a href="forgot-password.html" class="forget-password">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="checkout-discount">
                <h5>Bạn có vourcher giảm giá?
                    <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                        aria-controls="collapseOne" class="btn btn-link btn-toggle">NHẬP MÃ</button>
                </h5>

                <div id="collapseTwo" class="collapse">
                    <div class="feature-box">
                        <div class="feature-box-content">
                            <p>Nếu bạn có mã giảm giá, vui lòng nhập dưới đây.</p>

                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm w-auto"
                                        placeholder="Coupon code" required="" />
                                    <div class="input-group-append">
                                        <button class="btn btn-sm mt-0" type="submit">
                                            Apply Coupon
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('checkoutStore') }}" method="POST" id="checkout-form">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <ul class="checkout-steps">
                            <li>
                                <h4 class="step-title">Thông tin đơn hàng</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Họ tên
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <input type="text" name="fullname" class="form-control" required />
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <input type="email" name="email" class="form-control" required />
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" />
                                </div>

                                <div class="form-group">
                                    <label>SĐT<abbr class="required" title="required">*</abbr></label>
                                    <input type="tel" class="form-control" name="phone" required />
                                </div>

                                <div class="form-group">
                                    <label class="order-comments">Ghi chú</label>
                                    <textarea class="form-control" name="note" placeholder="Notes about your order, e.g. special notes for delivery."
                                        ></textarea>
                                </div>

                            </li>
                        </ul>
                    </div>
                    <!-- End .col-lg-8 -->

                    <div class="col-lg-5">
                        <div class="order-summary border p-4">
                            <h3>Đơn hàng của bạn</h3>

                            <table class="table table-mini-cart">
                                <thead>
                                    <tr>
                                        <th colspan="2">Sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $item)
                                        <tr>
                                            <td class="product-col">
                                                <p class="product-title">
                                                    {{ $item->name }}
                                                    <span class="product-qty">x {{ $item->quantityProductCart }}</span>
                                                </p>
                                            </td>

                                            <td class="price-col">
                                                <span>@php
                                                    $total = $item->price * $item->quantityProductCart;
                                                    echo number_format($total, '0', ',', '.');
                                                @endphp</span>đ
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <td>
                                            <h4>Tổng </h4>
                                        </td>

                                        <td class="price-col">
                                            <span>{{ number_format($totalPrice, '0', ',', '.') }}đ</span>
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>

                            <div class="payment-methods">
                                <h4 class="">Phương thức thanh toán</h4>
                                <input type="radio" checked value="COD" name="payment-method" id="cod">
                                <label for="cod">Thanh toán tại nhà</label> <br>
                                <input type="radio" value="ONLINE" name="payment-method" id="online">
                                <label for="online">Thanh toán Online</label>
                            </div> <br>

                            <button type="submit" name="btnSubmit" class="btn btn-dark btn-place-order"
                                form="checkout-form">
                                Thanh toán
                            </button>
                        </div>
                        <!-- End .cart-summary -->
                    </div>
                    <!-- End .col-lg-4 -->
                </div>
                <!-- End .row -->
            </form>
        </div>
        <!-- End .container -->
    </main>
@endsection
