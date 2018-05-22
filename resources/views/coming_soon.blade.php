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
        <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <div class="b-header b-header_main">
            <div class="container">
                <div class="clearfix row">
                    <div class="col-10 col-xl-4 col-lg-4 col-mb-4 col-sm-4 col-xs-8">
                        <div class="b-logo text-sm-left text-lg-left text-xl-left">
                            <a class="d-inline-block" href="#"><img src="{{ URL::asset('assets/images/header1.png') }}" class="img-fluid d-block" alt="HMTI" /></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

<section id="slider-sec" class="slider3">
        <div id="slider3" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="7000">
            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox" id="beranda">
                <div class="carousel-item fullwidth active">
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_left">
                        <div class="container">
                        <div class="row justify-content-center">
                            <!-- Column -->
                            <div class="col-lg-7 col-md-6 align-self-center text-center" data-aos="fade-up" data-aos-duration="1200">
                            <h1 class="title typewrite" data-type='["Coming","Soon"]'>&nbsp;</h1>
                                <h4 class="subtitle font-light">Himpunan Mahasiswa Teknologi Informasi<br/>Universitas Udayana</h4>
                            </div>
                            <!-- Column -->
                        </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <!-- Slide Background --><img src="assets/images/sliders/slide1.jpg" alt="We are Digital Agency" class="slide-image" />

                </div>
                <!-- End of Slide -->
            </div>
        </div>
        <!-- End Slider -->
    </section>
</div>