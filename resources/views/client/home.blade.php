@extends('layouts.client')
@section('content')
    <main class="main">
        <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
            data-owl-options="{
        'loop': false
    }">
            @php
                $banners = DB::table('banners')->get();
            @endphp

            @foreach ($banners as $item)
                @if ($item->is_active == 'true')
                    <div class="home-slide home-slide1 banner">
                        <img class="slide-bg" src="{{ asset('images/' . $item->image) }}" width="1903" height="499"
                            alt="slider image">
                    </div>
                @endif
            @endforeach
        </div>


        <div class="container">
            <div class="info-boxes-slider owl-carousel owl-theme mb-2"
                data-owl-options="{
            'dots': false,
            'loop': false,
            'responsive': {
                '576': {
                    'items': 2
                },
                '992': {
                    'items': 3
                }
            }
        }">
                <div class="info-box info-box-icon-left">
                    <i class="icon-shipping"></i>

                    <div class="info-box-content">
                        <h4>MIỄN PHÍ SHIP</h4>
                        <p class="text-body">Miễn phí ship cho đơn hàng từ 1.000.000đ.</p>
                    </div>
                    <!-- End .info-box-content -->
                </div>
                <div class="info-box info-box-icon-left">
                    <i class="icon-money"></i>
                    <div class="info-box-content">
                        <h4>HOÀN TRẢ</h4>
                        <p class="text-body">100% tiền được hoàn trả</p>
                    </div>

                </div>

                <div class="info-box info-box-icon-left">
                    <i class="icon-support"></i>
                    <div class="info-box-content">
                        <h4>Hỗ trợ online 24/7</h4>
                        <p class="text-body">Hỗ trợ khách hàng 24/7.</p>
                    </div>
                    <!-- End .info-box-content -->
                </div>
                <!-- End .info-box -->
            </div>
            <!-- End .info-boxes-slider -->

            <div class="banners-container mb-2">
                <div class="banners-slider owl-carousel owl-theme"
                    data-owl-options="{
                'dots': false
            }">
                    <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate"
                        style="background-color: #ccc;" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                        <figure class="w-100">
                            <img src="{{ asset('images/' . 'slideshow1.webp') }}" alt="banner" width="380"
                                height="175" />
                        </figure>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate"
                        data-animation-name="fadeInUpShorter" data-animation-delay="200">
                        <figure class="w-100">
                            <img src="{{ asset('images/' . 'slideshow2.webp') }}" style="background-color: #ccc;"
                                alt="banner" width="380" height="175" />
                        </figure>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate"
                        style="background-color: #ccc;" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                        <figure class="w-100">
                            <img src="{{ asset('images/' . 'slideshow3.webp') }}" alt="banner" width="380"
                                height="175" />
                        </figure>
                    </div>
                    <!-- End .banner -->
                </div>
            </div>
        </div>
        <!-- End .container -->

        {{-- Đổ sản phẩm --}}
        <section class="featured-products-section">
            <div class="container">
                <h2 class="section-title heading-border ls-20 border-0">Sản phẩm mới ra</h2>
                <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                    data-owl-options="{
                'dots': false,
                'nav': true
            }">
                    @foreach ($productsNew as $item)
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="{{ route('detailProduct', $item->id) }}">
                                    <img src="{{ asset('images/' . $item->img) }}" width="280" height="280"
                                        alt="product">
                                    {{-- <img src="assets/views/images/products/product-1-2.jpg" width="280" height="280"
                                        alt="product"> --}}
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="#" class="product-category">{{ $item->categoryName }}</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ route('detailProduct', $item->id) }}">{{ $item->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">{{ number_format($item->price + '3000000', 0, ',', '.') }}đ</del>
                                    <span class="product-price">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="{{ route('buyNow', $item->id) }}" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>MUA NGAY</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
                <!-- End .featured-proucts -->
            </div>
        </section>

        @foreach ($categories as $i => $item)
            <section class="new-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-20 border-0">{{ $item->name }}</h2>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2"
                        data-owl-options="{
                'dots': false,
                'nav': true,
                'responsive': {
                    '992': {
                        'items': 4
                    },
                    '1200': {
                        'items': 5
                    }
                }
            }">
                        @php
                            $products = DB::table('products')
                                ->where('iddm', $item->id)
                                ->get();
                        @endphp
                        @foreach ($products as $product)
                            <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                                <figure>
                                    <a href="{{ route('detailProduct', $product->id) }}">
                                        <img src="{{ asset('images/' . $product->img) }}" width="220" height="220"
                                            alt="product">

                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                </figure>
                                <div class="product-details">

                                    <h3 class="product-title">
                                        <a href="{{ route('detailProduct', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:80%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        <del
                                            class="old-price">{{ number_format($product->price + '3000000', 0, ',', '.') }}đ</del>
                                        <span
                                            class="product-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                    </div>
                                    <!-- End .price-box -->
                                    <div class="product-action">
                                        <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                class="icon-heart"></i></a>
                                        {{-- <a href="{{ route('buyNow', $product->id) }}"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i><span>MUA NGAY</span></a> --}}

                                        <a href="{{ route('buyNow', $product->id) }}" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i><span>MUA NGAY</span></a>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                    </div>
                                </div>
                                <!-- End .product-details -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endforeach

        {{-- Hết màn hình --}}
        <section class="feature-boxes-container">
            <div class="container appear-animate" data-animation-name="fadeInUpShorter">
                <div class="row">
                    <div class="col-md-4">
                        <div class="feature-box px-sm-5 feature-box-simple text-center">
                            <div class="feature-box-icon">
                                <i class="icon-earphones-alt"></i>
                            </div>

                            <div class="feature-box-content p-0">
                                <h3>HỖ TRỢ KHÁCH HÀNG</h3>
                                <h5>Bạn sẽ không cô đơn</h5>

                                <p>Chúng tôi thực sự quan tâm đến bạn và trang web của bạn nhiều như bạn. Mua Porto hoặc bất
                                    kỳ chủ đề nào khác từ chúng tôi, bạn sẽ nhận được hỗ trợ miễn phí 100%.</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="feature-box px-sm-5 feature-box-simple text-center">
                            <div class="feature-box-icon">
                                <i class="icon-credit-card"></i>
                            </div>

                            <div class="feature-box-content p-0">
                                <h3>HOÀN TOÀN CÓ THỂ TÙY CHỈNH</h3>
                                <h5>Các tùy chọn</h5>

                                <p>Với Porto, bạn có thể tùy chỉnh bố cục, màu sắc và kiểu dáng chỉ trong vài phút. Hãy bắt
                                    đầu tạo một trang web tuyệt vời ngay bây giờ!</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="feature-box px-sm-5 feature-box-simple text-center">
                            <div class="feature-box-icon">
                                <i class="icon-action-undo"></i>
                            </div>
                            <div class="feature-box-content p-0">
                                <h3>QUẢN TRỊ VIÊN MẠNH MẼ</h3>
                                <h5>Được tạo ra để giúp bạn</h5>

                                <p>Porto có các tính năng quản trị rất mạnh mẽ giúp khách hàng xây dựng cửa hàng của riêng
                                    mình chỉ trong vài phút mà không cần bất kỳ kỹ năng đặc biệt nào về phát triển web.</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-md-4 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container-->
        </section>
        <!-- End .feature-boxes-container -->

        <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}"
            data-image-src="assets/views/images/demoes/demo4/banners/banner-5.jpg">
            <div class="promo-banner banner container text-uppercase">
                <div class="banner-content row align-items-center text-center">
                    <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="600">
                        <h2 class="mb-md-0 text-white">ƯU ĐÃI <br> HÀNG ĐẦU</h2>
                    </div>
                    <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300">
                        <a href="category.html" class="btn btn-dark btn-black ls-10">Xem ngay</a>
                    </div>
                    <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter"
                        data-animation-delay="600">
                        <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                            <b>COUPON độc quyền</b>
                        </h4>
                        <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b
                                class="text-white bg-secondary ls-n-10">500.000VNĐ</b> OFF</h5>
                    </div>
                </div>
            </div>
        </section>

        {{-- Tin tức cố định --}}
        <section class="blog-section pb-0">
            <div class="container">
                <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
                    TIN TỨC MỚI NHẤT</h2>

                <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn"
                    data-owl-options="{
                'loop': false,
                'margin': 20,
                'autoHeight': true,
                'autoplay': false,
                'dots': false,
                'items': 2,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '480': {
                        'items': 2
                    },
                    '576': {
                        'items': 3
                    },
                    '768': {
                        'items': 4
                    }
                }
            }">
                    <article class="post">
                        <div class="post-media">
                            <a href="single.html">
                                <img src="{{ asset('images/' . 'slideshow2.webp') }}" alt="Post" width="225"
                                    height="280">
                            </a>
                            <div class="post-date">
                                <span class="day">26</span>
                                <span class="month">Feb</span>
                            </div>
                        </div>
                        <!-- End .post-media -->

                        <div class="post-body">
                            <h2 class="post-title">
                                <a href="single.html">Top New Collection</a>
                            </h2>
                            <div class="post-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non
                                    tellus sem. Aenean...</p>
                            </div>
                            <!-- End .post-content -->
                            <a href="single.html" class="post-comment">0 Comments</a>
                        </div>
                        <!-- End .post-body -->
                    </article>
                    <!-- End .post -->

                    <article class="post">
                        <div class="post-media">
                            <a href="single.html">
                                <img src="
                                {{ asset('images/' . 'slideshow1.webp') }}"
                                    alt="Post" width="225" height="280">
                            </a>
                            <div class="post-date">
                                <span class="day">26</span>
                                <span class="month">Feb</span>
                            </div>
                        </div>
                        <!-- End .post-media -->

                        <div class="post-body">
                            <h2 class="post-title">
                                <a href="single.html">Fashion Trends</a>
                            </h2>
                            <div class="post-content">
                                <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                                    the 1960s with the release of...</p>
                            </div>
                            <!-- End .post-content -->
                            <a href="single.html" class="post-comment">0 Comments</a>
                        </div>
                        <!-- End .post-body -->
                    </article>
                    <!-- End .post -->

                    <article class="post">
                        <div class="post-media">
                            <a href="single.html">
                                <img src="{{ asset('images/' . 'slideshow3.webp') }}" alt="Post" width="225"
                                    height="280">
                            </a>
                            <div class="post-date">
                                <span class="day">26</span>
                                <span class="month">Feb</span>
                            </div>
                        </div>
                        <!-- End .post-media -->

                        <div class="post-body">
                            <h2 class="post-title">
                                <a href="single.html">Right Choices</a>
                            </h2>
                            <div class="post-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the...</p>
                            </div>
                            <!-- End .post-content -->
                            <a href="single.html" class="post-comment">0 Comments</a>
                        </div>
                        <!-- End .post-body -->
                    </article>
                    <!-- End .post -->

                    <article class="post">
                        <div class="post-media">
                            <a href="single.html">
                                <img src="{{ asset('images/' . 'slideshow2.webp') }}" alt="Post" width="225"
                                    height="280">
                            </a>
                            <div class="post-date">
                                <span class="day">26</span>
                                <span class="month">Feb</span>
                            </div>
                        </div>
                        <!-- End .post-media -->

                        <div class="post-body">
                            <h2 class="post-title">
                                <a href="single.html">Perfect Accessories</a>
                            </h2>
                            <div class="post-content">
                                <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                                    the 1960s with the release of...</p>
                            </div>
                            <!-- End .post-content -->
                            <a href="single.html" class="post-comment">0 Comments</a>
                        </div>
                        <!-- End .post-body -->
                    </article>
                    <!-- End .post -->
                </div>

                <hr class="mt-0 m-b-5">

                <div class="brands-slider owl-carousel owl-theme images-center appear-animate"
                    data-animation-name="fadeIn" data-animation-duration="500"
                    data-owl-options="{
            'margin': 0}">
                    <img src="assets/views/images/brands/brand1.png" width="130" height="56" alt="brand">
                    <img src="assets/views/images/brands/brand2.png" width="130" height="56" alt="brand">
                    <img src="assets/views/images/brands/brand3.png" width="130" height="56" alt="brand">
                    <img src="assets/views/images/brands/brand4.png" width="130" height="56" alt="brand">
                    <img src="assets/views/images/brands/brand5.png" width="130" height="56" alt="brand">
                    <img src="assets/views/images/brands/brand6.png" width="130" height="56" alt="brand">
                </div>
                <!-- End .brands-slider -->

                <hr class="mt-4 m-b-5">


            </div>
        </section>
    </main>
@endsection
