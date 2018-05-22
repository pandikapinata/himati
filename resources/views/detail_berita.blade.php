@extends('layouts.app')

@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.0&appId=971477629686903&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="banner-innerpage" style="background-image:url(/assets/images/banner-bg2.jpg)">
    <div class="bg-dark">
        <section class="container content-boxed">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h3 class="text-white">
                        Berita              
                    </h3>
                </div>
                <div class="col-sm-5 text-right hidden-xs ">
                    <ol class="breadcrumb push-10-t " style="color:#fff !important;">
                        <li class="breadcrumb-item"><a href="/" class="link-effect" style="color:#fff !important;">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="/" class="link-effect" style="color:#fff !important;">List Berita</a></li>                        
                        <li class="breadcrumb-item active">Berita</li>
                    </ol>
                </div>
            </div>
        </section>
    </div>
</div>
        <div class="spacer">
            <div class="container">
                <div class="row m-t-30">
                    <!-- column  -->
                    <div class="col-lg-9 p-r-30">
                            <!-- Blog  -->
                            <h2 class="title-article font-light"><a href="#" class="link">{{$news->judul_berita}}</a></h2>

                            <ul class="text-uppercase m-t-10 m-b-20 b-b list-inline font-13 font-medium">
                            <li>{{$news->created_at->format('l, d F Y H:i')}}</li>
                            </ul>
                            <div class="row popup-gallery">
                                <!-- Column -->
                                <div class="col-md-12 text-center">
                                    <div class="card">
                                        <a href="{{ URL::asset('../assets/images/berita/' . $news->foto_berita) }}" class="img-ho" title="{{$news->judul_berita}}" author="aa">
                                            <img class="card-img-top" style="max-height: 600px; width: auto; max-width: 100%;" src="{{ URL::asset('../assets/images/berita/' . $news->foto_berita) }}" alt="wrappixel kit" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- <img src="{{ URL::asset('assets/images/berita/' . $news->foto_berita) }}" alt="wrapkit" class="img-fluid" /> --}}

                            <p class="m-t-30 m-b-30">
                                {!! $news->isi_berita !!}
                            </p>
                        <!-- Blog  -->
                        <hr class="op-5" />
                        <div class="fb-comments" data-href="http://127.0.0.1:8000/berita/{{$news->id}}" data-width="100%" data-numposts="5"></div>

                <!-- Row  -->
                    </div>
                <div class="col-lg-3">
                                
                        <!-- widget  -->
                        <div class="m-b-40">
                            <div class="row b-b p-b-10 m-t-10 no-block font-light text-uppercase">
                                <h6 class="no-shrink font-light align-self-center m-b-0">List Berita HMTI</h6>
                            </div>
                            <div class="row blog-row m-t-20 no-gutter b-b p-b-10 no-block">
                                <div class="col-md-4 no-gutter">
                                    <a href="#"><img src="assets/images/blog/img2.jpg" alt="wrapkit" class="img-responsive" /></a>
                                </div>
                                <div class="col-md-8 widget-content no-gutter">
                                    <div style="height:38px; overflow:hidden;">
                                        <h5><a href="#">The Universe is all of time and space........ ...aaasasa asasaaaswawa awwawaa</a></h5>
                                    </div>
                                    <div class="d-flex no-block font-13 icon-list-demo" style="margin-top: -7px;">
                                            <div class="preview">
                                                <i class="icon-Alarm-Clock m-l-0"></i><span> OCT 17, 2017</span>
                                            </div>
                                        </div> 
                                </div>      
                            </div>
                            <div class="row blog-row m-t-20 no-gutter b-b p-b-10 no-block">
                                <div class="col-md-4 no-gutter">
                                    <a href="#"><img src="assets/images/blog/img2.jpg" alt="wrapkit" class="img-responsive" /></a>
                                </div>
                                <div class="col-md-8 widget-content no-gutter">
                                    <div style="height:38px; overflow:hidden;">
                                        <h5><a href="#">The Universe is all of time and space........ ...aaasasa asasaaaswawa awwawaa</a></h5>
                                    </div>
                                    <p class=" p-t-7"> 23 May 2017</p>
                                </div>      
                            </div>
                            <div class="row blog-row m-t-20 no-gutter b-b p-b-10 no-block">
                                <div class="col-md-4 no-gutter">
                                    <a href="#"><img src="assets/images/blog/img2.jpg" alt="wrapkit" class="img-responsive" /></a>
                                </div>
                                <div class="col-md-8 widget-content no-gutter">
                                    <div style="height:38px; overflow:hidden;">
                                        <h5><a href="#">The Universe is all of time and space........ ...aaasasa asasaaaswawa awwawaa</a></h5>
                                    </div>
                                    <p class=" p-t-7"> 23 May 2017</p>
                                </div>      
                            </div>
                            <div class="row blog-row m-t-20 no-gutter b-b p-b-10 no-block">
                                <div class="col-md-4 no-gutter">
                                    <a href="#"><img src="assets/images/blog/img2.jpg" alt="wrapkit" class="img-responsive" /></a>
                                </div>
                                <div class="col-md-8 widget-content no-gutter">
                                    <div style="height:38px; overflow:hidden;">
                                        <h5><a href="#">The Universe is all of time and space........ ...aaasasa asasaaaswawa awwawaa</a></h5>
                                    </div>
                                    <p class=" p-t-7"> 23 May 2017</p>
                                </div>      
                            </div>
                        </div>
                        <!-- column  -->
                        </div>
                        <!-- widget  -->
                        <!-- widget  -->
                    </div>
                    <!-- column  -->
                </div>
            </div>
        <!-- ============================================================== -->
        <!-- End Team 1  -->
        <!-- ============================================================== -->
@endsection