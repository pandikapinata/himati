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
                <form class="form-material m-t-40" action="{{ route('newsfeed.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                @csrf
                <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input id="judul_berita" type="text" class="form-control" name="judul_berita" value="" required>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Thumbnails Berita</label>
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file">
                                <span name="foto_berita" class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                <input type="hidden">
                                <input type="file" name="foto_berita"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="deskripsi" class="form-control" rows="5" name="content" required></textarea>
                        <script>
                            CKEDITOR.replace( 'content' );
                        </script>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-outline-success">Submit</button>
                    </div>
                </div>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
