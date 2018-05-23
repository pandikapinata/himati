@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="card">
			<div class="card-body">
                <h2 class="font-light text-muted text-center" >
                    Form Edit Periode HMTI
                </h2>
                <h6 class="subtitle m-t-20 text-center">
                    Masukkan Periode HMTI
                </h6>
                <form class="form-material m-t-40" method="POST" action="{{ route('oprec.update', $oprecs) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input id="nama" class="form-control" type="text" name="nama" value="{{ $oprecs->nama_kegiatan }}" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="demo-checkbox">
                            <label style="width:100%;">Daftar Sie</label>
                            @foreach($sies as $number => $sie)
                            <input type="checkbox" id="cek{{$sie->id}}" name="cek[]" value="{{$sie->id}}"
                                @if( in_array($sie->id, $op_sie_ids) ) checked='1' @endif/>
                            <label for="cek{{$sie->id}}">{{ $sie->nama_sie }}</label>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>File upload</label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file">
                                    <span name="foto_kegiatan" class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="hidden">
                                    <input type="file" name="foto_kegiatan"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
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
