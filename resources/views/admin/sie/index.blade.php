@extends('layouts.admin')

@section('content')
<div class="">
    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle" data-toggle="modal" data-target="#mymodal"><i class="ti-plus text-white"></i></button>
</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Sie Kegiatan HMTI </h4>

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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($sies as $number => $sie)
                                        <tr>
                                            <td>{{ $number+1 }}</td>
                                            <td>{{ $sie->nama_sie }}</td>
                                            <td>
                                                <div class="inblock" data-toggle="tooltip" data-placement="top" title="Edit Sie" >
                                                    <a href="{{ route('master-sie.edit', $sie ) }}" class=" btn btn-circle btn-secondary" >
                                                        <span class="fa fa-pencil"></span>
                                                    </a>
                                                </div>

                                                <div class="inblock" data-toggle="tooltip" data-placement="top" title="Hapus Sie">
                                                <form id="formHapus{{$sie->id}}"  action="{{ route('master-sie.destroy', $sie->id ) }}"  method="POST" >
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button data-id="{{$sie->id}}" onclick="deleteData(this)" type="button" class="btn btn-danger btn-circle" >
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
                                Form Sie Kegiatan
                            </h1>
                            <h6 class="subtitle m-t-20 text-center">
                                Masukkan Daftar Nama Sie.
                            </h6>
                            <form class="form-material m-t-40" method="POST" action="{{ route('master-sie.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Nama Sie Kegiatan</label>
                                        <input id="nama" class="form-control" type="text" name="nama" required>
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