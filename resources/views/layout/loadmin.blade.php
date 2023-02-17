<?php

$menuadmin = config('menuadmin');
$menuuser = config('menuuser');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/user/html') }}/images/console_logo.jpg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Phòng điều khiển</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{ url('public/admin') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ url('public/admin') }}/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  
    <!-- CSS Just for demo purpose, don't include it in your project -->
    @yield('css')
    {{-- <link href="{{url('public/admin')}}/assets/css/demo.css" rel="stylesheet" /> --}}
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="{{ url('public/admin') }}/assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="{{ route('client.index') }}" class="simple-text">
                        Game Console Shop
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a style="text-align: center;" class="nav-link" href="{{ route('admin.index') }}">
                            <img style="height: 120px; width: 100px; border-radius:20px;"
                                src="{{ url('public/nhanvien') }}/{{ Auth::guard('user')->user()->anh }}"
                                title="{{ Auth::user()->hoten }}">
                        </a>
                    </li>
                    @if (Auth::guard('user')->user()->chucvu_id == 1)
                        @foreach ($menuadmin as $item)
                            <li>
                                <a class="nav-link" href="{{ route($item['route']) }}">
                                    <i class="nc-icon {{ $item['icon'] }}"></i>
                                    <p> {{ $item['label'] }} </p>
                                </a>
                            </li>
                        @endforeach
                    @else
                        @if (Auth::guard('user')->user()->chucvu_id == 3)
                            @foreach ($menuuser as $item)
                                <li>
                                    <a class="nav-link" href="{{ route($item['route']) }}">
                                        <i class="nc-icon {{ $item['icon'] }}"></i>
                                        <p> {{ $item['label'] }} </p>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    @endif

                </ul>
            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p class="navbar-brand"> Xin chào {{ Auth::user()->hoten }} chúc một ngày làm việc vui vẻ!
                    </p>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav ml-auto">
                            {{-- <li class="nav-item dropdown">
								 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									 <span class="no-icon">Dropdown</span>
								 </a>
								 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									 <a class="dropdown-item" href="#">Action</a>
									 <a class="dropdown-item" href="#">Another action</a>
									 <a class="dropdown-item" href="#">Something</a>
									 <a class="dropdown-item" href="#">Something else here</a>
									 <div class="divider"></div>
									 <a class="dropdown-item" href="#">Separated link</a>
								 </div>
							 </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.logout') }}">
                                    <span class="nc-icon nc-button-power"> Đăng xuất</span>
                                </a>
                                <a class="nav-link" href="{{ route('admin.taikhoan') }}">
                                    <span class="nc-icon nc-badge"> Thông tin cá nhân</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container">
                @if (Session::has('yes'))
                    <div style="text-align: center;" class="alert alert-success alert-dismissible" v-if="stock_warning">

                        <img src="{{ url('public/khachhang') }}/icon-thanh-cong.png" width="100">
                        <p style="color: black; text-align: center">{{ Session::get('yes') }}</p>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                @endif
                @if (Session::has('no'))
                    <div style="text-align: center" class="alert alert-danger alert-dismissible" v-if="stock_warning">
                        <i style="text-align: center" class="fa fa-exclamation-circle"></i>
                        <img style="text-align: center"
                            src="{{ url('public/khachhang') }}/png-clipart-computer-icons-error-information-error-angle-triangle.png"
                            width="100">
                        <p style="color: black;">{{ Session::get('no') }}</p>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                @endif
            </div>

            @yield('main')


            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="{{ route('admin.index') }}">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
   
</body>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
</script>
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

    try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

    } catch (err) {
        console.log('Facebook Track Error:', err);
    }
</script>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries
  
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyBN1LKUONE28Z53v3aBfwNBECsZNgBV22I",
      authDomain: "shopconsole-36375.firebaseapp.com",
      projectId: "shopconsole-36375",
      storageBucket: "shopconsole-36375.appspot.com",
      messagingSenderId: "657692580201",
      appId: "1:657692580201:web:9b5148a7c8835a599445f8",
      measurementId: "G-0JWB9XW0F5"
    };
  
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
  </script>
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"


integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@yield('js')

</html>
