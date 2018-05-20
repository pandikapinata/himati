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
    <div class="banner-innerpage" style="background-image:url(../assets/images/banner-bg2.jpg)">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center ">
                <!-- Column -->
                <div class="col-md-6 align-self-center text-center" data-aos="fade-down" data-aos-duration="1200">
                    <h1 class="title">Blog Detail Page</h1>
                    <h6 class="subtitle op-8">We are Small Team of Creative People working together</h6> </div>
                <!-- Column -->
            </div>
        </div>
    </div>
        <div class="spacer">
            <div class="container">
                <div class="row m-t-30">
                    <!-- column  -->
                    <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-3 p-r-30">
                            <!-- Blog  -->
                            <h2 class="title-article font-light"><a href="#" class="link">{{$news->judul_berita}}</a></h2>

                            <ul class="text-uppercase m-t-10 m-b-20 b-b list-inline font-13 font-medium">
                            <li>{{$news->created_at->format('l, d F Y H:i')}}</li>
                            </ul>
                            <img src="{{ URL::asset('assets/images/berita/' . $news->foto_berita) }}" alt="wrapkit" class="img-fluid" />

                            <p class="m-t-30 m-b-30">
                                {!! $news->isi_berita !!}
                            </p>
                        <!-- Blog  -->
                        <hr class="op-5" />
                        <div class="fb-comments" data-href="http://127.0.0.1:8000/berita/{{$news->id}}" data-width="100%" data-numposts="5"></div>

                <!-- Row  -->
                    </div>
                </div>
                        <!-- widget  -->
                    </div>
                    <!-- column  -->
                </div>
            </div>
        <!-- ============================================================== -->
        <!-- End Team 1  -->
        <!-- ============================================================== -->
@endsection