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
                <form class="form-material m-t-40" action="{{ route('kegiatan.update', $kegiatan) }}" method="POST" enctype="multipart/form-data">
	            <div class="modal-body">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="nama" class="col-sm-12 control-label">Nama Kegiatan</label>

                    <div class="col-sm-12">
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ $kegiatan->nama_kegiatan }}" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi" class="col-sm-12 control-label">Deskripsi</label>

                    <div class="col-sm-12">
                        <textarea id="deskripsi" class="form-control" rows="5" name="deskripsi" >{{ $kegiatan->desk_kegiatan }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto_kegiatan" class="col-sm-12 control-label">File Image</label>

                    <div class="col-sm-12">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                            <span class="input-group-addon btn btn-default btn-file">
                                <span name="foto_kegiatan" class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                <input type="hidden">
                                <input type="file" name="foto_kegiatan">
                            </span>
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                        <small class="text-danger">Maks. Ukuran File 2MB</small>
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
