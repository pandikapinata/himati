<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Himpunan Mahasiswa Teknologi Informasi</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/bootstrap-touch-slider/bootstrap-touch-slider.css')}}"  >
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- This is for the animation CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/aos/dist/aos.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/prism/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
    <!-- This page plugin CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/magnific-popup/dist/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/owl.carousel/dist/assets/owl.theme.green.css')}}">
    <!-- This css we made it from our predefine componenet
    we just copy that css and paste here you can also do that -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/demo.css')}}">
    <!-- Common style CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">HMTI</p>
        </div>
    </div>
        <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <div class="b-main_menu-wrapper hidden-lg-up">
            <ul class="mobile-top">
                <li class="search">
                    <div class="search-holder-mobile">
                        <input type="text" name="search-mobile" value="" placeholder="Search" class="form-control">
                        <a class="fa fa-search"></a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto categories"  id="mobile-top-menu">
                <li class="nav-item has-sub dropdown-wrapper from-bottom">
                    <a class="nav-link js-scroll-trigger" href="#beranda"><span class="top">Beranda</span></a>
                </li>
                <li class="nav-item has-sub dropdown-wrapper from-bottom">
                    <a class="nav-link js-scroll-trigger" href="#berita"><span class="top">Berita</span></a>
                </li>
                <li class="nav-item has-sub dropdown-wrapper from-bottom">
                    <a class="nav-link js-scroll-trigger" href="#kegiatan"><span class="top">Kegiatan</span></a>
                </li>
                <li class="nav-item has-sub dropdown-wrapper from-bottom">
                    <a class="nav-link" href="#fungsionaris"><span class="top">Fungsionaris</span></a>
                </li>
                <li class="nav-item has-sub dropdown-wrapper from-bottom">
                        <a class="nav-link" href="#kontak"><span class="top">Kontak</span></a>
                    </li>
                <li class="nav-item has-sub dropdown-wrapper from-bottom">
                    <a class="nav-link" href="/rental"><span class="top">Sewa</span></a>
                </li>
                @auth('guest')
                <div class="nav-item dropdown" id="header13">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('guest')->user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('setting.edit', Auth::guard('guest')->user()->id) }}">
                                {{ __('Setting') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('pass.resetForm') }}">
                                {{ __('Change Password') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ url('guest/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                        </div>
                    </div>
                @else
                <div class="act-buttons">
                    <a href=""  data-toggle="modal" data-target="#login" class="btn btn-outline-style1" >{{ __('Login') }}</a>
                </div>
                @endauth
            </ul>
        </div>
        <div class="b-header b-header_main">
            <div class="container">
                <div class="clearfix row">
                    <div class="col-10 col-xl-4 col-lg-4 col-mb-4 col-sm-4 col-xs-8">
                        <div class="b-logo text-sm-left text-lg-left text-xl-left">
                            <a class="d-inline-block" href="#"><img src="{{ URL::asset('assets/images/header1.png') }}" class="img-fluid d-block" alt="HMTI" /></a>
                        </div>

                    </div>
                    <div class="col-xl-8 col-lg-8 col-mb-8 col-sm-12 col-xs-12 hidden-sm-down hidden-md-down">
                        <div class="b-menu_top_bar_container topbar">
                            <div class="b-main_menu header13 po-relative">
                                <div class="container  p-r-0">
                                    <!-- Header 13 navabar -->
                                    <nav class="navbar navbar-expand-lg hover-dropdown h13-nav">
                                        <div class="collapse navbar-collapse" id="header13">
                                            <ul class="navbar-nav ml-auto" id="top-menu">
                                                <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#fungsionaris">Fungsionaris</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                                            </ul>
                                            @auth('guest')
                                            <div class="nav-item dropdown" id="header13">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        {{ Auth::guard('guest')->user()->name }}
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="{{ route('setting.edit', Auth::guard('guest')->user()->id) }}">
                                                            {{ __('Setting') }}
                                                        </a>

                                                        <a class="dropdown-item" href="{{ route('pass.resetForm') }}">
                                                            {{ __('Change Password') }}
                                                        </a>

                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ url('guest/logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>


                                                    </div>
                                                </div>
                                            @else
                                            <div class="act-buttons">
                                                <a href=""  data-toggle="modal" data-target="#login" class="btn btn-outline-style1" >{{ __('Login') }}</a>
                                            </div>
                                            @endauth
                                        </div>
                                    </nav>
                                    <!-- End Header 13 navabar -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden-lg-up col-2 col-xl-2 col-lg-2 col-mb-2 col-sm-8 col-xs-6">
                        <div class="b-header_right">
                            <div class="hidden-lg-up">
                                <ul class="pl-0 mb-0 list-unstyled">
                                    <i class="icon-menu icons ti-menu" id="ti-menu"></i>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="login" class="modal fade custom-modal modal2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content po-relative">
                    <div class="modal-body p-0 text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-7">
                                <div class="modal-bg ">
                                    <img src="/assets/images/logo_icon.png" alt="hmti">
                                    <h2 class="font-light text-muted m-t-20 text-center">Masuk ke HMTI</h2>
                                    <form class="m-t-30" method="POST" action="{{ url('/guest/login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="username" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
                                                    @if ($errors->has('username'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password" required>

                                                    @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center m-t-20">
                                                <button type="submit" class="btn btn-outline-style"><span> Masuk ke HMTI </span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
                @yield('content')
        </div>
        <!-- Row  -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer1 font-14">
            <div class="f1-topbar"></div>
            <!-- Row  -->
            <div class="f1-middle">
                <div class="container">
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-3 col-md-6">
                            <a href="#"><img src="assets/images/logo-300.png" alt="TI" /></a>
                            <p class="m-t-20">You can relay on our amazing features list and also our customer services will be great experience.</p>
                            <p>our amazing features list and also our customer services is great.</p>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-3 col-md-6">
                            <div class="d-flex no-block m-b-10 m-t-20">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
                                <div class="info">
                                    <span class="font-medium text-dark db m-t-5">Alamat</span><br/>
                                    <p>Jl. Kampus Udayana Bukit Jimbaran, Jimbaran,<br/>
                                        Kuta Sel., Kabupaten Badung,<br/>
                                        Bali 80361</p>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-3 col-md-12 ">
                            <div class="d-flex no-block m-b-10 m-t-20">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
                                <div class="info">
                                    <span class="font-medium text-dark db m-t-5">Telepon</span><br/>
                                    <p>(0361) 701806 </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 ">
                            <div class="d-flex no-block m-b-10 m-t-20">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
                                <div class="info">
                                    <span class="font-medium text-dark db m-t-5">Email</span><br/>
                                    <p><a href="mailto:it@unud.ac.id">it@unud.ac.id</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row  -->
            <div class="f1-bottom-bar">
                <div class="container">
                <div class="d-flex">
                    <div class="m-t-10 m-b-10">© 2018. Himpunan Mahasiswa Teknologi Informasi | <a href="https://it.unud.ac.id/" class="p-10 p-l-0">Teknologi Informasi</a>.</div>
                    <div class="links ml-auto m-t-10 m-b-10">
                        <a href="#" class="link p-10"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="link p-10"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="link p-10"><i class="fa fa-linkedin"></i></a>
                        <a href="#" class="link p-10"><i class="fa fa-pinterest"></i></a>
                        <a href="#" class="link p-10"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Back to top -->
        <!-- ============================================================== -->
        <a class="bt-top btn btn-circle btn-lg btn-style" href="#top"><i class="ti-arrow-up"></i></a>

    </div>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @section('script')
    <script src="{{asset('assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/node_modules/popper/dist/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- This is for the animation -->
    <script src="{{asset('assets/node_modules/aos/dist/aos.js')}}"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/js/style.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/node_modules/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/prism/prism.js')}}"></script>
    <script src="{{asset('assets/js/type.js')}}"></script>
    <script src="{{asset('assets/js/portfolio.js')}}"></script>



    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB63aSeCGJzKLpE5K2Cwnccs5lELmN55Wg&amp;callback=myMap"></script>
    @show
</body>
</html>
