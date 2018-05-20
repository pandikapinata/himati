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
                <form class="form-material m-t-40" action="{{ route('fungsionaris.update', $funct) }}" method="POST" enctype="multipart/form-data">
	            <div class="modal-body">
                @csrf
                {{ method_field('PATCH') }}
                <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama" >Nama Fungsionaris</label>
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ $funct->nama_fungsionaris }}" autofocus>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select id="jabatan" name="jabatan" class="form-control" required>
                                <option value=" " {{$funct->jabatan->nama_jabatan}}>-- Pilih Jabatan --</option>
                            @foreach( $jabatan as $jabatans )
                                <?php $selected = ($funct->jabatan->nama_jabatan==$jabatans->nama_jabatan ?"selected":""); ?>
                                <option value="{{ $jabatans->id }}"{{$selected}}>{{ $jabatans->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Periode Awal</label>
                        <input id="period_awal" class="form-control" type="text" name="period_awal" value="{{ $funct->periode_awal }}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Periode Akhir</label>
                        <input id="period_akhir" class="form-control" type="text" name="period_akhir" value="{{ $funct->periode_akhir }}">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Upload Foto Profile</label>
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file">
                                <span name="foto_kegiatan" class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                <input type="hidden">
                                <input type="file" name="media_profile"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-outline-success">Submit</button>
                    </div>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
