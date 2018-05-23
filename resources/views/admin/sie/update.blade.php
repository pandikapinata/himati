@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card">
			<div class="card-body">
                <h2 class="font-light text-muted text-center" >
                    Form Edit Kegiatan HMTI
                </h2>
                <h6 class="subtitle m-t-20 text-center">
                    Masukkan Revisi Kegiatan HMTI
                </h6>
                <form class="form-material m-t-40" action="{{ route('master-sie.update', $sie) }}" method="POST" enctype="multipart/form-data">
	            <div class="modal-body">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="nama" class="col-sm-12 control-label">Nama Sie Kegiatan</label>

                    <div class="col-sm-12">
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ $sie->nama_sie }}" autofocus>
                    </div>
                </div>

	            </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-outline-success">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
