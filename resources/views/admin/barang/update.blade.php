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
                <form class="form-material m-t-40" action="{{ route('barang.update', $barang) }}" method="POST" enctype="multipart/form-data">
	            <div class="modal-body">
                @csrf
                {{ method_field('PATCH') }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input id="kd_brg" class="form-control" type="text" name="kd_brg" value="{{ $barang->kode_barang }}" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input id="nama" class="form-control" type="text" name="nama" value="{{ $barang->nama_barang }}" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <form class="p-r-20">
                            <div class="form-group">
                                <label class="control-label">Stok</label>
                                <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="{{ $barang->stok_barang }}" name="stok_brg"> </div>
                        </form>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Harga</label>
                            <input id="hrg_brg" class="form-control" type="text" name="hrg_brg"  value="{{ $barang->harga_sewa }}" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Upload Foto Profile</label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file">
                                    <span name="foto_barang" class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="hidden">
                                    <input type="file" name="foto_barang"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
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
@section('script')
    @parent
    <script>
        jQuery(document).ready(function() {
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'btn-xs ti-plus',
                verticaldownclass: 'btn-xs ti-minus'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
        });
    </script>
@endsection