<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>technology Shop</title>


    <meta name="description" content="GoodGames - Bootstrap template for communities and games store">
    <meta name="keywords" content="game, gaming, template, HTML template, responsive, Bootstrap, premium">
    <meta name="author" content="_nK">

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/user/html') }}/images/console_logo.jpg" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet"
        type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet"
        href="{{ url('public/teamplate_fontend') }}/assets/vendor/bootstrap/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    {{-- <script defer src="{{ url('public/teamplate_fontend') }}/assets/vendor/fontawesome-free/js/all.js"></script>
    <script defer src="{{ url('public/teamplate_fontend') }}/assets/vendor/fontawesome-free/js/v4-shims.js"></script> --}}

    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ url('public/teamplate_fontend') }}/assets/vendor/ionicons/css/ionicons.min.css">

    <!-- Flickity -->
    <link rel="stylesheet" href="{{ url('public/teamplate_fontend') }}/assets/vendor/flickity/dist/flickity.min.css">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/teamplate_fontend') }}/assets/vendor/photoswipe/dist/photoswipe.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/teamplate_fontend') }}/assets/vendor/photoswipe/dist/default-skin/default-skin.css">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet"
        href="{{ url('public/teamplate_fontend') }}/assets/vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/teamplate_fontend') }}/assets/vendor/summernote/dist/summernote-bs4.css">

    <!-- GoodGames -->
    <link rel="stylesheet" href="{{ url('public/teamplate_fontend') }}/assets/css/goodgames.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ url('public/teamplate_fontend') }}/assets/css/custom.css">

    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/jquery/dist/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <link rel="stylesheet" type="text/css" href="{{ url('public/teamplate_fontend') }}/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('public/user') }}/assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <!-- GoodGames -->
    <link rel="stylesheet" href="{{ url('public/user') }}/assets/css/goodgames.css">
    <!-- Custom Styles -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->

<body>


    <div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
        <div class="nano">
            <div class="nano-content">
                <a href="{{ route('client.index') }}" class="nk-nav-logo">
                    <img src="{{ url('public/user/html') }}/images/logo.png" width="200">
                </a>
                <div class="nk-navbar-mobile-content">
                    <ul class="nk-nav">
                        <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header class="nk-header nk-header-opaque">



        <!-- START: Top Contacts -->
        <!-- START: Top Contacts -->
        <div class="nk-contacts-top">
            <div class="container">
                <div class="nk-contacts-left">
                    <ul class="nk-social-links">
                        <li><a class="nk-social-rss" href="#"><span class="bi bi-rss"></span></a></li>
                        <li><a class="nk-social-twitch" href="#"><span class="bi bi-twitch"></span></a></li>
                        <li><a class="nk-social-steam" href="#"><span class="bi bi-steam"></span></a></li>
                        <li><a class="nk-social-facebook" href="#"><span class="bi bi-facebook"></span></a></li>
                        <li><a class="nk-social-google-plus" href="#"><span class="bi bi-google"></span></a></li>
                        <li><a class="nk-social-twitter" href="#" target="_blank"><span
                                    class="bi bi-twitter"></span></a>
                        </li>
                        <li><a class="nk-social-pinterest" href="#"><span class="bi bi-pinterest"></span></a></li>

                        <!-- Additional Social Buttons
                    <li><a class="nk-social-behance" href="#"><span class="fab fa-behance"></span></a></li>
                    <li><a class="nk-social-bitbucket" href="#"><span class="fab fa-bitbucket"></span></a></li>
                    <li><a class="nk-social-dropbox" href="#"><span class="fab fa-dropbox"></span></a></li>
                    <li><a class="nk-social-dribbble" href="#"><span class="fab fa-dribbble"></span></a></li>
                    <li><a class="nk-social-deviantart" href="#"><span class="fab fa-deviantart"></span></a></li>
                    <li><a class="nk-social-flickr" href="#"><span class="fab fa-flickr"></span></a></li>
                    <li><a class="nk-social-foursquare" href="#"><span class="fab fa-foursquare"></span></a></li>
                    <li><a class="nk-social-github" href="#"><span class="fab fa-github"></span></a></li>
                    <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a class="nk-social-linkedin" href="#"><span class="fab fa-linkedin"></span></a></li>
                    <li><a class="nk-social-medium" href="#"><span class="fab fa-medium"></span></a></li>
                    <li><a class="nk-social-odnoklassniki" href="#"><span class="fab fa-odnoklassniki"></span></a></li>
                    <li><a class="nk-social-paypal" href="#"><span class="fab fa-paypal"></span></a></li>
                    <li><a class="nk-social-reddit" href="#"><span class="fab fa-reddit"></span></a></li>
                    <li><a class="nk-social-skype" href="#"><span class="fab fa-skype"></span></a></li>
                    <li><a class="nk-social-soundcloud" href="#"><span class="fab fa-soundcloud"></span></a></li>
                    <li><a class="nk-social-slack" href="#"><span class="fab fa-slack"></span></a></li>
                    <li><a class="nk-social-tumblr" href="#"><span class="fab fa-tumblr"></span></a></li>
                    <li><a class="nk-social-vimeo" href="#"><span class="fab fa-vimeo"></span></a></li>
                    <li><a class="nk-social-vk" href="#"><span class="fab fa-vk"></span></a></li>
                    <li><a class="nk-social-wordpress" href="#"><span class="fab fa-wordpress"></span></a></li>
                    <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a></li>
                -->
                    </ul>
                </div>
                <div class="nk-contacts-right">
                    <ul class="nk-contacts-icons">

                        <li>
                            <a href="#" data-toggle="modal" data-target="#modalSearch">
                                <span class="bi bi-search"></span>
                            </a>
                        </li>
                        @if (!Auth::guard('khachhang')->user())
                            <li>
                                <a href="#" data-toggle="modal" data-target="#modalLogin">
                                    <span class="bi bi-person-fill"></span>
                                </a>
                            </li>


                            <li>
                                @if ($tuido->soluong == 0)
                                    <span class="nk-cart-toggle">
                                        <a href="{{ route('homeuser.tuido.index') }}">
                                            <span style="color: white" class="bi bi-cart3"></span></a>
                                        <span class="nk-badge">0</span>

                                    </span>
                                    <div style="text-align: center;" class="nk-cart-dropdown">
                                        Giỏ hàng rỗng!
                                    </div>
                                @else
                                    <span class="nk-cart-toggle">
                                        <a href="{{ route('homeuser.tuido.index') }}">
                                            <span style="color: white" class="bi bi-cart3"></span></a>
                                        <span class="nk-badge">{{ $tuido->soluong }}</span>

                                    </span>
                                    <div class="nk-cart-dropdown">
                                        @foreach ($tuido->tuido as $item)
                                            <div class="nk-widget-post">
                                                <a href="store-product.html" class="nk-post-image">
                                                    <img src="{{ url('public/uploads') }}/{{ $item['anh'] }}"
                                                        alt="In all revolutions of">

                                                </a>
                                                <h3 class="nk-post-title">
                                                    <a href="{{ route('homeuser.tuido.xoa', $item['id']) }}"
                                                        class="nk-cart-remove-item"><span
                                                            class="ion-android-close"></span></a>
                                                    <a href="store-product.html"> {{ $item['tensp'] }}</a>

                                                </h3>
                                                <div class="nk-gap-1"></div>
                                                <span style="font-size: 20px;" class="cart_quantity">
                                                    {{ $item['soluong'] }}
                                                    x
                                                    <span class="cart_amount"> <span class="price_symbole">
                                                            {{ number_format($item['gia']) }}</span></span></span>


                                            </div>
                                        @endforeach


                                        <div class="nk-gap-2"></div>
                                        <div class="text-center">
                                            <p class="cart_total"><strong>Tổng tiền:</strong> <span
                                                    class="cart_price">
                                                    <span class="price_symbole"></span></span>
                                                {{ number_format($tuido->gia) }}.VNĐ</p>

                                            <a href="{{ route('homeuser.tuido.index') }}"
                                                class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white">Đi
                                                thanh toán</a>




                                        </div>
                                    </div>
                                @endif
                            </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Top Contacts -->



        <!--
        START: Navbar

        Additional Classes:
            .nk-navbar-sticky
            .nk-navbar-transparent
            .nk-navbar-autohide
    -->
        <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
            <div class="container">
                <div class="nk-nav-table">

                    <a href="{{ route('client.index') }}" class="nk-nav-logo">
                        <img src="{{ url('public/user/html') }}/images/logo.png" width="200">
                    </a>

                    <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">

                        <li>
                            <a href="{{ route('client.index') }}">
                                <i class="bi bi-house-door-fill"></i>
                                Trang chủ
                            </a>
                        </li>
                        <li class=" nk-drop-item">
                            <a>

                                <i class="bi bi-hdd-fill"></i>
                                Máy Game

                            </a>
                            <ul class="dropdown">

                                <li class=" nk-drop-item">
                                    <a>
                                        <i class="bi bi-playstation"></i>
                                        Playstation

                                    </a>
                                    <ul class="dropdown">
                                        @foreach ($loai as $item)
                                            @if ($item->id == 1 || $item->id == 4 || $item->id == 5 || $item->id == 6 || $item->id == 7 || $item->id == 8 || $item->id == 9)
                                                <li>
                                                    <a href="{{ route('client.show', ['slug' => $item->slug]) }}">

                                                        {{ $item->loai }}

                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class=" nk-drop-item">
                                    <a>
                                        <i class="bi bi-nintendo-switch"></i>
                                        Nintendo

                                    </a>
                                    <ul class="dropdown">
                                        @foreach ($loai as $item)
                                            @if ($item->id == 10 || $item->id == 11 || $item->id == 12)
                                                <li>
                                                    <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                                        {{ $item->loai }}

                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class=" nk-drop-item">
                                    <a>
                                        <i class="bi bi-xbox"></i>
                                        Xbox

                                    </a>
                                    <ul class="dropdown">
                                        @foreach ($loai as $item)
                                            @if ($item->id == 13 || $item->id == 15)
                                                <li>
                                                    <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                                        {{ $item->loai }}

                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class=" nk-drop-item">
                            <a>

                                <i class="bi bi-sd-card-fill"></i>
                                Game Card

                            </a>
                            <ul class="dropdown">

                                @foreach ($loai as $item)
                                    @if ($item->id == 2 || $item->id == 30 || $item->id == 31)
                                        <li>
                                            <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                                {{ $item->loai }}

                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class=" nk-drop-item">
                            <a href="">

                                <i class="bi bi-headset"></i>
                               
                                Phụ Kiện

                            </a>
                            <ul class="dropdown">

                                <li>
                                    @foreach ($loai as $item)
                                        @if ($item->id == 60 || $item->id == 55 || $item->id == 61)
                                <li>
                                    <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                        <i class="bi bi-playstation"></i>
                                        {{ $item->loai }}

                                    </a>
                                </li>
                                @endif
                                @endforeach
                        </li>
                        <li>
                            @foreach ($loai as $item)
                                @if ($item->id == 56)
                        <li>
                            <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                <i class="bi bi-nintendo-switch"></i>
                                {{ $item->loai }}

                            </a>
                        </li>
                        @endif
                        @endforeach
                        </li>
                        <li>
                            @foreach ($loai as $item)
                                @if ($item->id == 57)
                        <li>
                            <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                <i class="bi bi-xbox"></i>
                                {{ $item->loai }}

                            </a>
                        </li>
                        @endif
                        @endforeach
                        </li>
                    </ul>
                    </li>
                @else
                    <li>
                        @if ($tuido->soluong == 0)
                            <span class="nk-cart-toggle">
                                <a href="{{ route('homeuser.tuido.index') }}">
                                    <span style="color: white" class="bi bi-cart3"></span></a>
                                <span class="nk-badge">0</span>

                            </span>
                            <div style="text-align: center;" class="nk-cart-dropdown">
                                Giỏ hàng rỗng!
                            </div>
                        @else
                            <span class="nk-cart-toggle">
                                <a href="{{ route('homeuser.tuido.index') }}">
                                    <span style="color: white" class="bi bi-cart3"></span></a>
                                <span class="nk-badge">{{ $tuido->soluong }}</span>

                            </span>
                            <div class="nk-cart-dropdown">
                                @foreach ($tuido->tuido as $item)
                                    <div class="nk-widget-post">
                                        <a href="store-product.html" class="nk-post-image">
                                            <img src="{{ url('public/uploads') }}/{{ $item['anh'] }}"
                                                alt="In all revolutions of">

                                        </a>
                                        <h3 class="nk-post-title">
                                            <a href="{{ route('homeuser.tuido.xoa', $item['id']) }}"
                                                class="nk-cart-remove-item"><span
                                                    class="ion-android-close"></span></a>
                                            <a href="store-product.html"> {{ $item['tensp'] }}</a>

                                        </h3>
                                        <div class="nk-gap-1"></div>
                                        <span style="font-size: 20px;" class="cart_quantity">
                                            {{ $item['soluong'] }}
                                            x
                                            <span class="cart_amount"> <span class="price_symbole">
                                                    {{ number_format($item['gia']) }}</span></span></span>


                                    </div>
                                @endforeach


                                <div class="nk-gap-2"></div>
                                <div class="text-center">
                                    <p class="cart_total"><strong>Tổng tiền:</strong> <span
                                            class="cart_price">
                                            <span class="price_symbole"></span></span>
                                        {{ number_format($tuido->gia) }}.VNĐ</p>

                                    <a href="{{ route('homeuser.tuido.index') }}"
                                        class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white">Đi
                                        thanh toán</a>




                                </div>
                            </div>
                        @endif
                    </li>

                    </ul>
                </div>
            </div>
            </div>
            <!-- END: Top Contacts -->



            <!--
START: Navbar

Additional Classes:
.nk-navbar-sticky
.nk-navbar-transparent
.nk-navbar-autohide
-->
            <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
                <div class="container">
                    <div class="nk-nav-table">

                        <a href="{{ route('client.index') }}" class="nk-nav-logo">
                            <img src="{{ url('public/user/html') }}/images/logo.png" width="200">
                        </a>

                        <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">

                            <li>
                                <a href="{{ route('client.index') }}">
                                    <i class="bi bi-house-door-fill"></i>
                                    Trang chủ
                                </a>
                            </li>
                            <li class=" nk-drop-item">
                                <a>

                                    <i class="bi bi-hdd-fill"></i>
                                    Máy Game

                                </a>
                                <ul class="dropdown">

                                    <li class=" nk-drop-item">
                                        <a>
                                            <i class="bi bi-playstation"></i>
                                            Playstation

                                        </a>
                                        <ul class="dropdown">
                                            @foreach ($loai as $item)
                                                @if ($item->id == 1 || $item->id == 4 || $item->id == 5 || $item->id == 6 || $item->id == 7 || $item->id == 8 || $item->id == 9)
                                                    <li>
                                                        <a
                                                            href="{{ route('client.show', ['slug' => $item->slug]) }}">

                                                            {{ $item->loai }}

                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class=" nk-drop-item">
                                        <a>
                                            <i class="bi bi-nintendo-switch"></i>
                                            Nintendo

                                        </a>
                                        <ul class="dropdown">
                                            @foreach ($loai as $item)
                                                @if ($item->id == 10 || $item->id == 11 || $item->id == 12)
                                                    <li>
                                                        <a
                                                            href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                                            {{ $item->loai }}

                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class=" nk-drop-item">
                                        <a>
                                            <i class="bi bi-xbox"></i>
                                            Xbox

                                        </a>
                                        <ul class="dropdown">
                                            @foreach ($loai as $item)
                                                @if ($item->id == 13 || $item->id == 15)
                                                    <li>
                                                        <a
                                                            href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                                            {{ $item->loai }}

                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class=" nk-drop-item">
                                <a>

                                    <i class="bi bi-sd-card-fill"></i>
                                    Game Card

                                </a>
                                <ul class="dropdown">

                                    @foreach ($loai as $item)
                                        @if ($item->id == 2 || $item->id == 30 || $item->id == 31)
                                            <li>
                                                <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                                    {{ $item->loai }}

                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class=" nk-drop-item">
                                <a href="{{ route('client.phukien') }}">

                                    <i class="bi bi-headset"></i>
                                    Phụ Kiện

                                </a>
                                <ul class="dropdown">

                                    <li>
                                        @foreach ($loai as $item)
                                            @if ($item->id == 55 || $item->id == 60 || $item->id == 61)
                                    <li>
                                        <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                            <i class="bi bi-playstation"></i>
                                            {{ $item->loai }}

                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                            </li>
                            <li>
                                @foreach ($loai as $item)
                                    @if ($item->id == 56)
                            <li>
                                <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                    <i class="bi bi-nintendo-switch"></i>
                                    {{ $item->loai }}

                                </a>
                            </li>
                            @endif
                            @endforeach
                            </li>
                            <li>
                                @foreach ($loai as $item)
                                    @if ($item->id == 57)
                            <li>
                                <a href="{{ route('client.show', ['slug' => $item->slug]) }}">
                                    <i class="bi bi-xbox"></i>
                                    {{ $item->loai }}

                                </a>
                            </li>
                            @endif
                            @endforeach
                            </li>
                        </ul>
                        </li>
                        <li class=" nk-drop-item">
                            <a>
                                <i class="bi bi-person-circle"></i>
                                {{ Auth::guard('khachhang')->user()->hoten }}

                            </a>
                            <ul class="dropdown">
                                <li>
                                    <a href="{{ route('client.taikhoan') }}">
                                        <i class="bi bi-person-video2"></i>
                                        Thông tin cá nhân

                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('client.doimatkhau') }}">
                                        <i class="bi bi-gear-fill"></i>
                                        Thay đổi mật khẩu

                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('hoadon.lichsuhoadon') }}">
                                        <i class="bi bi-clipboard-pulse"></i>
                                        Lịch sữ hóa đơn
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('client.logout') }}">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Đăng xuất
                                    </a>
                                </li>


                            </ul>
                        </li>


                        @endif
                        </ul>
                        <ul class="nk-nav nk-nav-right nk-nav-icons">

                            <li class="single-icon d-lg-none">
                                <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                    <span class="nk-icon-burger">
                                        <span class="nk-t-1"></span>
                                        <span class="nk-t-2"></span>
                                        <span class="nk-t-3"></span>
                                    </span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>
            <!-- END: Navbar -->

    </header>

    @yield('main')




    <footer class="nk-footer">
        <div class="container">
            <div class="footer_section_2">
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <h2 class="account_text">GIỚI THIỆU</h2>
                        <p class="ipsum_text_2"> Công ty GPM Việt Nam, chuyên cung cấp các giải pháp về CNTT, Hệ
                            thống
                            bán lẻ chính hãng các sản phẩm công nghệ cao cấp: máy chơi game, điện thoại, máy tính bảng,
                            laptop, đồ chơi kĩ thuật số.
                        </p>
                        <h2 class="account_text">Mua hàng trả góp</h2>
                        <div class="useful_link">
                            <ul>
                                <li>-Tổng đài: <a style="color: white" href="#"> 1900 6098</a></li>
                                <li>-Hotline:<a style="color: white" href="#"> 0932 600 188</a></li>
                                <li>-Website chính: <a style="color: white"
                                        href="{{ route('client.index') }}">shopgame.vn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <h2 class="account_text">ĐỊA CHỈ</h2>
                        <p class="ipsum_text_2">
                            6 Lê Quát, Đông Xuyên, Long Xuyên, An Giang</p>

                        <p class="ipsum_text_2">
                            SĐT: 0902 777 186 ( A.Tuấn)</p>

                        <p class="ipsum_text_2">Liên hệ:
                            <a style="color: white" href="https://gpm.vn/lien-he">
                                lienhe@gpm.vn</a>
                        </p>
                        <h2 class="account_text">Thời gian làm việc</h2>
                        <p class="ipsum_text_2">
                            - Các ngày trong tuần sáng </p>
                        <p style="color: white">(T2 - T7): 7h30 - 11h30</p>

                        <p class="ipsum_text_2">
                            - Các ngày trong tuần chiều </p>
                        <p style="color: white">(T2 - T7): 13h00 - 17h00</p>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <h2 class="account_text">THEO DÕI</h2>
                        <ul>
                            <a href="https://www.facebook.com/gpm.vn"><img
                                    src="{{ url('public/user/html') }}/images/fb-icon.png"></a>
                            <br>
                            <br>
                            <a href="#"><img src="{{ url('public/user/html') }}/images/twitter-icon.png"></a>

                            <br>
                            <br>
                            <a href="#"><img src="{{ url('public/user/html') }}/images/linkdin-icon.png"></a>

                            <br>
                            <br>
                            <a href="#"><img src="{{ url('public/user/html') }}/images/instagram-icon.png"></a>

                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <h2 class="account_text">THÔNG TIN</h2>
                        <p class="ipsum_text_2">
                            <a style="color: white" href="{{ route('client.thongtin') }}">
                                Quy định chung</a>
                        </p>

                        <p class="ipsum_text_2">
                            <a style="color: white" href="{{ route('client.tragop') }}">
                                Mua hàng trả góp</a>
                        </p>
                        <p class="ipsum_text_2">
                            <a style="color: white" href="{{ route('client.datcoc') }}">
                                Quy định đặt cọc</a>
                        </p>
                        <p class="ipsum_text_2">
                            <a style="color: white" href="{{ route('client.baohanh') }}">
                                Quy định bảo hành</a>
                        </p>

                        <p class="ipsum_text_2">
                            <a style="color: white" href="{{ route('client.vanchuyen') }}">
                                Chính sách vận chuyển</a>
                        </p>
                        <p class="ipsum_text_2">
                            <a style="color: white" href="{{ route('client.doitra') }}">
                                Chính sách đổi / trả hàng</a>
                        </p>

                        <p class="ipsum_text_2">
                            Tuyển dụng</p>



                    </div>
                </div>
            </div>
        </div>

        <div class="nk-copyright">
            <div class="container">
                <div class="nk-copyright-left">
                    <p class="copyright_text">Copyright 2022 All Right Reserved By <a style="color: white"
                            href="https://html.design/"> Free html
                            Templates</a></p>
                </div>
                <div class="nk-copyright-right">
                    <ul class="nk-social-links-2">
                        <li><a class="nk-social-rss" href="#"><span class="bi bi-rss"></span></a></li>
                        <li><a class="nk-social-twitch" href="#"><span class="bi bi-twitch"></span></a></li>
                        <li><a class="nk-social-steam" href="#"><span class="bi bi-steam"></span></a></li>
                        <li><a class="nk-social-facebook" href="#"><span class="bi bi-facebook"></span></a></li>
                        <li><a class="nk-social-google-plus" href="#"><span class="bi bi-google"></span></a></li>
                        <li><a class="nk-social-twitter" href="#" target="_blank"><span
                                    class="bi bi-twitter"></span></a></li>
                        <li><a class="nk-social-pinterest" href="#"><span class="bi bi-pinterest"></span></a></li>
                        <!-- Additional Social Buttons
                            <li><a class="nk-social-behance" href="#"><span class="fab fa-behance"></span></a></li>
                            <li><a class="nk-social-bitbucket" href="#"><span class="fab fa-bitbucket"></span></a></li>
                            <li><a class="nk-social-dropbox" href="#"><span class="fab fa-dropbox"></span></a></li>
                            <li><a class="nk-social-dribbble" href="#"><span class="fab fa-dribbble"></span></a></li>
                            <li><a class="nk-social-deviantart" href="#"><span class="fab fa-deviantart"></span></a></li>
                            <li><a class="nk-social-flickr" href="#"><span class="fab fa-flickr"></span></a></li>
                            <li><a class="nk-social-foursquare" href="#"><span class="fab fa-foursquare"></span></a></li>
                            <li><a class="nk-social-github" href="#"><span class="fab fa-github"></span></a></li>
                            <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a></li>
                            <li><a class="nk-social-linkedin" href="#"><span class="fab fa-linkedin"></span></a></li>
                            <li><a class="nk-social-medium" href="#"><span class="fab fa-medium"></span></a></li>
                            <li><a class="nk-social-odnoklassniki" href="#"><span class="fab fa-odnoklassniki"></span></a></li>
                            <li><a class="nk-social-paypal" href="#"><span class="fab fa-paypal"></span></a></li>
                            <li><a class="nk-social-reddit" href="#"><span class="fab fa-reddit"></span></a></li>
                            <li><a class="nk-social-skype" href="#"><span class="fab fa-skype"></span></a></li>
                            <li><a class="nk-social-soundcloud" href="#"><span class="fab fa-soundcloud"></span></a></li>
                            <li><a class="nk-social-slack" href="#"><span class="fab fa-slack"></span></a></li>
                            <li><a class="nk-social-tumblr" href="#"><span class="fab fa-tumblr"></span></a></li>
                            <li><a class="nk-social-vimeo" href="#"><span class="fab fa-vimeo"></span></a></li>
                            <li><a class="nk-social-vk" href="#"><span class="fab fa-vk"></span></a></li>
                            <li><a class="nk-social-wordpress" href="#"><span class="fab fa-wordpress"></span></a></li>
                            <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a></li>
                        -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- START: Scripts -->


    <div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>

                    <h4 class="mb-0">Tìm Kiếm</h4>

                    <div class="nk-gap-1"></div>
                    <form action="{{ route('timkiem.sanpham') }}" method="POST" autocomplete="off" class="nk-form nk-form-style-1">
                        {{csrf_field()}}
                        <input type="text" id="key-words" name="keywords_submit" class="form-control"
                            placeholder="Nhập sản phẩm cần tìm" >
                        <div id="search-ajax"></div>
                        <input type="submit" name="search_item" class="btn btn-secondary btn-sm" value="Tìm kiếm">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Search Modal -->



    <!-- START: Login Modal -->
    <div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>

                    <h4 style="text-align: center" class="mb-0"><span class="text-main-1">Đăng</span>
                        Nhập</h4>

                    <div class="nk-gap-1"></div>
                    <form action="{{ route('client.postlogin') }}" method="post" class="nk-form text-white">
                        <div class="row vertical-gap">
                            <div class="col-md-6">
                                User Name and password:
                                @csrf
                                <div class="nk-gap"></div>
                                <input type="text" value="" name="tendangnhap" class=" form-control"
                                    placeholder="User Name...">

                                <div class="nk-gap"></div>
                                <input type="password" value="" name="password" class="required form-control"
                                    placeholder="Password...">
                            </div>
                        </div>

                        <div class="nk-gap-1"></div>
                        <div class="row vertical-gap">
                            <div class="col-md-6">
                                <button type="submit"
                                    class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Đăng Nhập</button>
                            </div>
                            <div class="col-md-6">
                                <div class="mnt-5">
                                    <small><a style="color: white" href="{{ route('client.quenmatkhau') }}">Quên mật
                                            khẩu?</a></small>
                                </div>
                                <div class="mnt-5">
                                    <small><a style="color: white" href="{{ route('client.getdangky') }}">Đăng
                                            ký</a></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Object Fit Polyfill -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/object-fit-images/dist/ofi.min.js"></script>

    <!-- GSAP -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/gsap/src/minified/TweenMax.min.js"></script>
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js">
    </script>

    <!-- Popper -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/popper.js/dist/umd/popper.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Sticky Kit -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/sticky-kit/dist/sticky-kit.min.js"></script>

    <!-- Jarallax -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/jarallax/dist/jarallax-video.min.js"></script>

    <!-- imagesLoaded -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- Flickity -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/flickity/dist/flickity.pkgd.min.js"></script>

    <!-- Photoswipe -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/photoswipe/dist/photoswipe.min.js"></script>
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js">
    </script>

    <!-- Jquery Validation -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/jquery-validation/dist/jquery.validate.min.js">
    </script>

    <!-- Jquery Countdown + Moment -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js">
    </script>
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/moment/min/moment.min.js"></script>
    <script
        src="{{ url('public/teamplate_fontend') }}/assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js">
    </script>

    <!-- Hammer.js -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/hammerjs/hammer.min.js"></script>

    <!-- NanoSroller -->
    <script
        src="{{ url('public/teamplate_fontend') }}/assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js">
    </script>

    <!-- SoundManager2 -->
    <script
        src="{{ url('public/teamplate_fontend') }}/assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js">
    </script>

    <!-- Seiyria Bootstrap Slider -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js">
    </script>

    <!-- Summernote -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/vendor/summernote/dist/summernote-bs4.min.js"></script>

    <!-- nK Share -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/plugins/nk-share/nk-share.js"></script>

    <!-- GoodGames -->
    <script src="{{ url('public/teamplate_fontend') }}/assets/js/goodgames.min.js"></script>
    <script src="{{ url('public/teamplate_fontend') }}/assets/js/goodgames-init.js"></script>
    <!-- END: Scripts -->
    @yield('js')
    <script>
        $('#key-words').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('auto.complete') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token,
                        },
                        success: function(data) {
                            $('#search-ajax').fadeIn();
                            $('#search-ajax').html(data);
    
                        }
                    });
                }else
                {
                    $('#search-ajax').fadeOut();
                }
            });
            $(document).on('click','.li_search_ajax',function(){
                $('#key-words').val($(this).text());
                $('#search-ajax').fadeOut();
            });
    </script>

</body>

</html>
