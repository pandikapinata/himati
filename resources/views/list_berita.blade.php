@extends('layouts.secondary')

@section('content')

<div class="banner-innerpage" style="background-image:url(/assets/images/banner-bg2.jpg)">
    <div class="bg-dark">
        <section class="container content-boxed">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h3 class="text-white">
                        List Berita
                    </h3>
                </div>
                <div class="col-sm-5 text-right hidden-xs ">
                    <ol class="breadcrumb push-10-t " style="color:#fff !important;">
                        <li class="breadcrumb-item"><a href="/" class="link-effect" style="color:#fff !important;">Beranda</a></li>
                        <li class="breadcrumb-item active">List Berita</li>
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
                            <!-- Row  -->
                            <!-- Column -->
                            @foreach($news as $number => $new)
                                <div class="row list-berita d-flex b-b p-b-10 m-t-10 m-b-20 no-block no-gutter">
                                    <div class="col-md-3"><img src="assets/images/berita/{{$new->foto_berita}}" alt="hmti" class="img-responsive" style="width:auto; height:auto; max-height:200px; max-width:200px"></div>
                                    <div class="col-md-9" style="padding-left: 15px;">
                                        <h5 class="font-medium p-l-15"><a href="{{ route('berita.show', $new ) }}" class="linking">{{$new->judul_berita}}</a></h5>
                                        <div class="d-flex no-block font-13 icon-list-demo p-l-15">
                                            <div class="preview">
                                                <i class="icon-Alarm-Clock m-l-0"></i><span>{{$new->created_at->format('l, d F Y')}}</span>
                                            </div>
                                        </div>
                                        <div style="height:80px; overflow:hidden;" class="m-b-10 p-l-15">
                                            <p class="m-t-1">{{ words(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",($new->isi_berita))),50) }}</p>
                                        </div>
                                        <a data-toggle="collapse" href="#" class="linking text-danger-gradiant m-t-10 p-t-10 p-l-15">Selengkapnya <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            <!-- Column -->
                            @endforeach
                            <!-- column  -->
                            <div class="col-lg-12">
                                <ul class="pagination justify-content-center">
                                    {!! $news->links();!!}
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <!-- widget  -->
                            <div class="m-b-40">
                                <div class="row b-b p-b-10 m-t-10 no-block font-light text-uppercase">
                                    <h6 class="no-shrink font-light align-self-center m-b-0">List Berita HMTI</h6>
                                </div>
                                @foreach($news_sidebar as $number => $new)
                                <div class="row blog-row m-t-20 no-gutter b-b p-b-10 no-block">
                                    <div class="col-md-4 no-gutter">
                                        <a href="{{ route('berita.show', $new ) }}"><img src="assets/images/berita/{{$new->foto_berita}}" alt="hmti" class="img-responsive" /></a>
                                    </div>
                                    <div class="col-md-8 widget-content no-gutter">
                                        <div style="height:38px; overflow:hidden;">
                                            <h5><a href="{{ route('berita.show', $new ) }}">{{$new->judul_berita}}</a></h5>
                                        </div>
                                        <div class="d-flex no-block font-13 icon-list-demo" style="margin-top: -7px;">
                                            <div class="preview">
                                                <i class="icon-Alarm-Clock m-l-0"></i><span>{{$new->created_at->format('d F Y')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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