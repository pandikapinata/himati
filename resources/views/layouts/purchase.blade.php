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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
    <!-- This page plugin CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/owl.carousel/dist/assets/owl.theme.green.css')}}">
    <!-- This css we made it from our predefine componenet
    we just copy that css and paste here you can also do that -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/demo.css')}}">
    <!-- Common style CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!--alerts CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}"  type="text/css">
    @show
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
            <div class="topbar">
                    <div class="header13 po-relative">
                            <div class="container">
                                <!-- Header 13 navabar -->
                                <nav class="navbar navbar-expand-lg hover-dropdown h13-nav">
                            <a class="navbar-brand" href="#"><img src="{{ URL::asset('assets/images/header1.png') }}" alt="HMTI" /></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header13" aria-controls="header13" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ti-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="header13">
                                <ul class="navbar-nav ml-auto" id="top-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('utama') }}">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('rent.transaksi') }}">Transaksi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('rent.cart') }}">Cart({{$jml_brg}})</a></li>

                                {{-- <li class="nav-item"><a class="nav-link" href="{{route('rental.index')}}">Sewa</a></li> --}}
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

            <div id="login" class="modal fade custom-modal modal2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content po-relative">
                        <div class="modal-body p-0 text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-md-7">
                                    <div class="modal-bg ">
                                        <img src="/assets/images/logo_icon.png" alt="wrapkit">
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
            <div class="f1-middle">
                <div class="container">
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-3 col-md-6">
                            <a href="#"><img src="{{ URL::asset('assets/images/logo-300.png') }}" alt="TI" /></a>
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
            <div class="f1-bottom-bar">
                <div class="container">
                <div class="d-flex font-14">
                    <div class="m-t-10 m-b-30 copyright">© 2018. Himpunan Mahasiswa Teknologi Informasi | <a href="https://it.unud.ac.id/" class="p-10 p-l-0">Teknologi Informasi</a>.</div>
                    <div class="links ml-auto m-t-10 m-b-10">
                        <a href="#" class="p-10 p-l-0">Terms & Conditions</a>
                        <a href="#" class="p-10">Privacy Policy</a>
                        <a href="#" class="p-10">Legal Disclaimer</a>
                    </div>
                </div>
                </div>
            </div>

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
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/js/style.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    @show
</body>
</html>
