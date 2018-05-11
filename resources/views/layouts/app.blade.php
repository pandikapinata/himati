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
                                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#fungsionaris">Fungsionaris</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                                </ul>
                                <div class="act-buttons">
                                    <button class="btn btn-outline-style1">Login</button>
                                </div>
                            </div>
                        </nav>
                        <!-- End Header 13 navabar -->
                    </div>
                </div>
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/js/style.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/prism/prism.js')}}"></script>
    <script src="{{asset('assets/js/type.js')}}"></script>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB63aSeCGJzKLpE5K2Cwnccs5lELmN55Wg&amp;callback=myMap"></script>
</body>
</html>
