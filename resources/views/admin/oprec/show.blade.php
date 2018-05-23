@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <img src="{{ URL::asset('assets/images/oprec/' . $oprecs->media_kegiatan) }}" alt="hmti" class="img-fluid m-t-40" />
                <h2 class="font-light text-muted text-center" >
                    Daftar Sie
                </h2>
                @foreach($oprecs->oprec_sie as $number => $oprec)
                <h4 class="font-light text-muted text-center" >
                    {{ $oprec->sie->nama_sie}}
                </h4>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
