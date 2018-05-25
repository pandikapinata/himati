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
    <!-- This css we made it from our predefine componenet
    we just copy that css and paste here you can also do that -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/demo.css')}}">
    <!-- Common style CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
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
        <div class="container-fluid">
            @yield('content')

        </div>
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
                            <p class="m-t-20">Himpunan Teknologi Informasi, Fakultas Teknik, Universitas Udayana</p>
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
                    <div class="m-t-10 m-b-10">© 2018. Himpunan Mahasiswa Teknologi Informasi | <a href="https://it.unud.ac.id/" target="_blank" class="p-10 p-l-0">Teknologi Informasi</a>.</div>
                    <div class="links ml-auto m-t-10 m-b-10">
                        <a href="https://www.facebook.com/it.unud/" target="_blank" class="link p-10"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/HMTIUdayana" target="_blank" class="link p-10"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/hmtiudayana/" target="_blank" class="link p-10"><i class="fa fa-instagram"></i></a>
                        <a href="https://line.me/R/ti/p/%40jki6864s" target="_blank" class="link p-10"><i class="fab fa-line"></i></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->

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
    @show
</body>
</html>