@extends('layouts.no-header')

@section('content')
<section id="slider-sec" class="slider4">
        <div id="slider4" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="7000">
            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox" id="beranda">
                <div class="carousel-item active">
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_left" style="top: 35%;">
                        <div class="container">
                        <div class="row justify-content-center">
                            <!-- Column -->
                            <div class="col-lg-7 col-md-6 align-self-center text-center" data-aos="fade-up" data-aos-duration="1200">
                                    <a class="d-inline-block" href="#"><img src="{{ URL::asset('assets/images/header1.png') }}" class="img-fluid d-block" alt="HMTI" style="height: auto;width: 600px;"/></a>
                            <h1 class="title-60px typewrite">404 Not Found</h1>
                                <h4 class="subtitle">Himpunan Mahasiswa Teknologi Informasi<br/>Universitas Udayana</h4>
                                <a class="linking-blue btn btn-rounded btn-outline-info font-16 m-t-30 m-l-20" href="{{ route('utama') }}">Kembali Ke HMTI <i class="ti-arrow-right"></i></a>
                                
                            </div>
                            <!-- Column -->
                        </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                    <img src="assets/images/sliders/slide2.jpg" class="slide-image" />

                </div>
                <!-- End of Slide -->
            </div>
        </div>
        <!-- End Slider -->
    </section>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

@endsection