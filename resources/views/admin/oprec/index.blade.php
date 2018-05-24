@extends('layouts.admin')

@section('content')
<div class="">
    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle" data-toggle="modal" data-target="#mymodal"><i class="ti-plus text-white"></i></button>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Open Reuirement HMTI </h4>
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
                @endif
                    <div class="table-responsive">
                        <table id="table_id" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Poster</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($oprecs as $number => $oprec)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <td>{{ $oprec->nama_kegiatan }}</td>
                                        <td>{{ $oprec->media_kegiatan }}</td>
                                        <td>
                                        <div class="inblock" data-toggle="tooltip" data-placement="top" title="Edit Oprec" >
                                            <a href="{{ route('oprec.edit', $oprec ) }}" class=" btn btn-circle btn-secondary" >
                                                <span class="fa fa-pencil"></span>
                                            </a>
                                        </div>
                                        <div class="inblock" >
                                            <a href="{{ route('oprec.show', $oprec ) }}" class="btn btn-circle btn-secondary" >
                                                <span class="fa fa-eye"></span>
                                            </a>
                                        </div>

                                        <div class="inblock" data-toggle="tooltip" data-placement="top" title="Hapus Oprec">
                                            <form id="formHapus{{$oprec->id}}"  action="{{ route('oprec.destroy', $oprec->id ) }}"  method="POST" >
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button data-id="{{$oprec->id}}" onclick="deleteData(this)" type="button" class="btn btn-danger btn-circle" >
                                                    <span class="fa fa-trash-o">
                                                </button>
                                            </form>
                                        </div>
                                        </td>

                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

<div id="mymodal" class="modal fade custom-modal modal2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content po-relative">
            <div class="modal-body p-0 ">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="modal-bg">
                            <h1 class="font-light text-muted text-center" >
                                Form Open Requirement
                            </h1>
                            <h6 class="subtitle m-t-20 text-center">
                                Masukkan Daftar Open Requirement HMTI yang baru.
                            </h6>

                            <form class="form-material m-t-40" method="POST" action="{{ route('oprec.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Nama Kegiatan</label>
                                        <input id="nama" class="form-control" type="text" name="nama" required>
                                    </div>
                                </div>

                                <div class="col-lg-10">
                                    <div class="demo-checkbox">
                                        <label>Daftar Sie</label>
                                        @foreach($sies as $number => $sie)
                                        <input type="checkbox" id="cek{{$sie->id}}" name="cek[]" value="{{$sie->id}}" />
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
                                        <small class="text-danger">Maks. Ukuran File 2MB</small>
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
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
@endsection
@section('script')
    @parent
    @if(session()->has('delete'))
    <script>
        $(document).ready(function(){
            deleteComplete();
        })
        function deleteComplete(){
            swal("Deleted!", "Datamu Sudah Terhapus.", "success")
        }

    </script>
    @endif

@endsection