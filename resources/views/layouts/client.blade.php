<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 03:38:16 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Nguyễn Viết Sơn</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Nguyễn Viết Sơn">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/views/images/icons/favicon.png') }}">

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800',
                    'Oswald:300,400,500,600,700,800'
                ]
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    {{-- <link rel="stylesheet" href="assets/views/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/views/css/bootstrap.min.css') }}">

    <!-- Main CSS File -->

    <link rel="stylesheet" href="{{ asset('assets/views/css/demo4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/views/vendor/fontawesome-free/css/all.min.css') }}">
    {{-- css cho giỏ hàng --}}
    <link rel="stylesheet" href="{{ asset('assets/views/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/views/css/home.css') }}">

</head>

<body>
    <div class="page-wrapper">


        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left d-none d-sm-block">
                        <p class="top-message text-uppercase">Giảm giá toàn bộ 15% vào ngày 07/07</p>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100">
                        <div class="header-dropdown dropdown-expanded d-none d-lg-block">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>

                                    @if (Session::has('user'))
                                        <a href="{{ url('cart') }}">Giỏ hàng</a>
                                    @endif

                                    @php
                                        $user = Session::get('user');
                                    @endphp
                                    @if (!Session::has('user'))
                                        <li><a href="{{ url('login') }}">Đăng nhập</a></li>/
                                        <li><a href="{{ url('login') }}">Đăng ký</a></li>
                                    @else
                                        <li class="hello"><a href="">Xin chào {{ $user->name }}</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('dashbroad') }}">Thông tin cá nhân</a></li>
                                                @if ($user->role == 'Admin')
                                                    <li><a href="{{ url('admin') }}">Truy cập trang admin</a></li>
                                                @endif

                                                <li><a href="">Lịch sử mua hàng</a></li>
                                                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                            <!-- End .header-menu -->
                        </div>
                        <!-- End .header-dropown -->

                        <span class="separator"></span>



                        <span class="separator"></span>

                        <div class="social-icons">
                            <a href="https://www.facebook.com/nguyenvietson250"
                                class="social-icon social-facebook icon-facebook" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                        </div>
                        <!-- End .social-icons -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-top -->

            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler text-primary mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="{{ url('home') }}" class="logo">
                            <img src="{{ asset('assets/views/images/logo.png') }}" width="111" height="44"
                                alt="Porto Logo">
                        </a>
                    </div>
                    <!-- End .header-left -->


                    {{-- //Thanh tìm kiếm  --}}
                    <div class="header-right w-lg-max">
                        <div
                            class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q"
                                        placeholder="Search..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
                                            <option value="">Danh mục</option>
                                            <option value="4">Điện thoại</option>
                                            <option value="12">Laptop</option>
                                            <option value="13">Màn hình</option>

                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>
                        <!-- End .header-search -->

                        <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                            <img alt="phone" src="{{ asset('assets/views/images/phone.png') }}" width="30"
                                height="30" class="pb-1">
                            <h6><span>SĐT Liên hệ</span><a href="tel:#" class="text-dark font1">0973657594</a>
                            </h6>
                        </div>

                        @if (!Session::has('user'))
                            <a href="{{ url('login') }}" class="header-icon" title="login"><i
                                    class="icon-user-2"></i></a>
                        @else
                            <a href="{{ url('dashbroad') }}" class="header-icon" title="login"><i
                                    class="icon-user-2"></i></a>
                        @endif

                        {{-- Cart --}}
                        <div class="dropdown cart-dropdown">
                            <a href="{{ url('cart') }}" title="Cart"
                                class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                data-display="static">
                                <i class="minicart-icon"></i>
                                @php
                                    if (Session::has('user')) {
                                        $carts = DB::table('carts')
                                            ->where('user_id', $user->id)
                                            ->select(
                                                'carts.*',
                                                'products.*',
                                                'carts.quantity as quantityProductCart',
                                                'carts.id as idCart',
                                            )
                                            ->join('products', 'carts.product_id', '=', 'products.id')
                                            ->get();
                                        $totalPrice = $carts->reduce(function ($carry, $item) {
                                            return $carry + $item->price * $item->quantityProductCart;
                                        }, 0);
                                    }
                                @endphp
                                <span class="cart-count badge-circle">
                                    @if (Session::has('user'))
                                        {{ count($carts) }}
                                    @else
                                        0
                                    @endif

                                </span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>
                                @if (Session::has('user'))
                                    <div class="dropdownmenu-wrapper custom-scrollbar">
                                        <div class="dropdown-cart-header">Giỏ hàng</div>
                                        <!-- End .dropdown-cart-header -->
                                        @if ($carts->count() > 0)
                                            @foreach ($carts as $item)
                                                <div class="dropdown-cart-products">
                                                    <div class="product">
                                                        <div class="product-details">
                                                            <h4 class="product-title">
                                                                <a href="#">{{ $item->name }}</a>
                                                            </h4>

                                                            <span class="cart-product-info">
                                                                <span
                                                                    class="cart-product-qty">{{ $item->quantityProductCart }}</span>
                                                                × {{ number_format($item->price, '0', ',', '.') }}đ
                                                            </span>
                                                        </div>


                                                        <figure class="product-image-container">
                                                            <a href="#" class="product-image">

                                                                <img src="{{ asset('images/' . $item->img) }}"
                                                                    alt="product" width="80" height="80">
                                                            </a>

                                                            <a href="{{ route('deleteCart', $item->idCart) }}"
                                                                class="btn-remove"
                                                                title="Remove Product"><span>×</span></a>
                                                        </figure>
                                                    </div>

                                                </div>
                                            @endforeach


                                            <div class="dropdown-cart-total">
                                                <span>TỔNG TIỀN:</span>

                                                <span
                                                    class="cart-total-price float-right">{{ number_format($totalPrice, '0', ',', '.') }}đ</span>
                                            </div>


                                            <div class="dropdown-cart-action">
                                                <a href="{{ url('cart') }}"
                                                    class="btn btn-gray btn-block view-cart">Giỏ
                                                    hàng</a>
                                                <a href="{{ route('checkout') }}"
                                                    class="btn btn-dark btn-block">Thanh
                                                    toán</a>
                                            </div>
                                        @else
                                            <h5>Giỏ hàng của bạn trống!</h5>
                                        @endif
                                        <!-- End .dropdown-cart-total -->
                                    </div>
                                @endif
                                <!-- End .dropdownmenu-wrapper -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        <!-- End .dropdown -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->

            {{-- Thanh menu --}}
            <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <nav class="main-nav w-100">
                        <ul class="menu">
                            <li class="active">
                                <a href="{{ url('home') }}">Trang chủ</a>
                            </li>
                            @php
                                $categories = DB::table('categories')->get();
                                $carts = DB::table('carts')->get();
                            @endphp
                            @foreach ($categories as $i => $item)
                                <li>
                                    <a href="{{ route('category', $item->id) }}">{{ $item->name }}</a>
                                    <!-- End .megamenu -->
                                </li>
                            @endforeach
                            {{-- <li><a href="blog.html">Blog</a></li> --}}
                            <li>
                                <a href="#">Khuyến mãi</a>
                                {{-- <ul class="custom-scrollbar">
                                    <li><a href="element-accordions.html">Accordion</a></li>
                                    <li><a href="element-alerts.html">Alerts</a></li>

                                </ul> --}}
                            </li>
                            <li><a href="contact.html">Liên hệ</a></li>
                            {{-- <li class="float-right"><a href="https://1.envato.market/DdLk5" rel="noopener"
                                    class="pl-5" target="_blank">Sale 15%</a></li>
                            <li class="float-right"><a href="#" class="pl-5">Điện thoại cũ!</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-bottom -->
        </header>
        <!-- End .header -->

        {{-- Home  --}}
        @yield('content')
        <!-- End .main -->

        <footer class="footer bg-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Thông tin liên hệ</h4>
                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Địa chỉ:</span>Chương Mỹ, Hà Nội
                                    </li>
                                    <li>
                                        <span class="contact-info-label">SĐT:</span><a href="tel:">0973657594</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a
                                            href="https://portotheme.com/cdn-cgi/l/email-protection#620f030b0e22071a030f120e074c010d0f"><span
                                                class="__cf_email__"
                                                data-cfemail="f499959d98b4918c9599849891da979b99">sonnguyen250204@gmail.com</span></a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Ngày/Giờ làm việc:</span> Thứ 2 - CN / 9:00 AM
                                        - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com/nguyenvietson250"
                                        class="social-icon social-facebook icon-facebook" target="_blank"
                                        title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-instagram icon-instagram"
                                        target="_blank" title="Instagram"></a>
                                </div>
                                <!-- End .social-icons -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Hỗ trợ khách hàng</h4>

                                <ul class="links">
                                    <li><a href="#">Trợ giúp & Câu hỏi</a></li>
                                    <li><a href="#">Kiểm tra đơn hàng</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Lịch sử đặt hàng</a></li>
                                    <li><a href="#">Quảng cáo</a></li>
                                    <li><a href="dashboard.html">Tài khoản</a></li>

                                    <li><a href="about.html">Về chúng tôi</a></li>
                                    <li><a href="#">Giảm giá</a></li>
                                    {{-- <li><a href="#">Privacy</a></li> --}}
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Từ khóa phổ biến</h4>

                                <div class="tagcloud">
                                    <a href="#">Điện thoại</a>
                                    <a href="#">iPhone 15</a>
                                    <a href="#">Máy tính</a>
                                    {{-- <a href="#">Clothes</a>
                                    <a href="#">Fashion</a> --}}


                                </div>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget widget-newsletter">
                                <h4 class="widget-title">Đăng ký nhận thông báo</h4>
                                <p>Nhận tất cả thông tin mới nhất về các sự kiện, chương trình khuyến mại và ưu đãi.
                                    Đăng ký nhận bản tin:
                                </p>
                                <form action="#" class="mb-0">
                                    <input type="email" class="form-control m-b-3" placeholder="Địa chỉ Email"
                                        required>

                                    <input type="submit" class="btn btn-primary shadow-none" value="Đăng ký">
                                </form>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom">
                    <div class="container d-sm-flex align-items-center">
                        <div class="footer-left">
                            <span class="footer-copyright">© Nguyễn Viết Sơn. 2024</span>
                        </div>

                        <div class="footer-right ml-auto mt-1 mt-sm-0">
                            <div class="payment-icons">
                                <span class="payment-icon visa"
                                    style="background-image: url(assets/views/images/payments/payment-visa.svg)"></span>
                                <span class="payment-icon paypal"
                                    style="background-image: url(assets/views/images/payments/payment-paypal.svg)"></span>
                                <span class="payment-icon stripe"
                                    style="background-image: url(assets/views/images/payments/payment-stripe.png)"></span>
                                <span class="payment-icon verisign"
                                    style="background-image:  url(assets/views/images/payments/payment-verisign.svg)"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .footer-bottom -->
            </div>
            <!-- End .container -->
        </footer>
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="demo4.html">Trang chủ </a></li>
                    <li>
                        <a href="#">Danh mục</a>
                        <ul>
                    
                            <li><a href="category-6col.html">Điện thoại</a></li>
                            <li><a href="category-7col.html">Máy tính</a></li>
                            <li><a href="category-8col.html">Màn hình</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Sản phẩm</a>
                        <ul>
                            @foreach ($categories as $i => $item)
                                <li>
                                    <a href="#" class="nolink">{{ $item->name }}</a>
                                    @php
                                        $products = DB::table('products')
                                            ->where('iddm', $i + 1)
                                            ->get();
                                    @endphp
                                    @foreach ($products as $product)
                                        <ul>
                                            <li><a href="#">{{ $product->name }}</a></li>
                                        </ul>
                                    @endforeach
                                </li>
                            @endforeach
                          
                        </ul>
                    </li>
                 

                    <ul class="mobile-menu">
                        @if (Session::has('user'))
                            <li><a href="{{ url('dashbroad') }}">Tài khoản</a></li>
                        @else
                            <li><a href="{{ url('login') }}">Đăng nhập</a></li>
                        @endif
                        <li><a href="contact.html">Liên hệ</a></li>

                        <li><a href="cart.html">Giỏ hàng</a></li>
                        {{-- <li><a href="login.html" class="login-link">Log In</a></li> --}}
                    </ul>
            </nav>
            <!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Tìm kiếm..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="https://www.facebook.com/nguyenvietson250" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
    

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo4.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="category.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>


    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/views/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/views/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/views/js/optional/isotope.pkgd.min.js') }}"></script>
    {{-- do cái này --}}
    <script src="{{ asset('assets/views/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/views/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/views/js/main.min.js') }}"></script>


    <!-- Main JS File -->
    {{-- <script src=""></script> --}}
</body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jul 2024 03:38:55 GMT -->

</html>
