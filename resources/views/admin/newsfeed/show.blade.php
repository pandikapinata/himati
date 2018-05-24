@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <img src="{{ URL::asset('assets/images/berita/' . $news->foto_berita) }}" alt="hmti" class="img-fluid m-t-40" />
                <ul class="text-uppercase m-t-10 m-b-20 b-b list-inline font-13 font-medium">
                    <li>{{$news->created_at->format('l, d F Y H:i')}}</li>
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
