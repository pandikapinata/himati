@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <img src="{{ URL::asset('assets/images/berita/' . $news->foto_berita) }}" alt="hmti" class="img-fluid m-t-40" />
                <ul class="text-uppercase m-t-40 list-inline font-13 font-medium">
                    <li><a href="#">John Deo</a></li>
                    <li><a href="#">NOV 08, 2017 </a></li>
                    <li><a href="#" class="text-info">NEWS</a></li>
                </ul>
                <h2 class="font-light text-muted text-center" >
                    {{$news->judul_berita}}
                </h2>
                <p>
                    {!! $news->isi_berita !!}
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
