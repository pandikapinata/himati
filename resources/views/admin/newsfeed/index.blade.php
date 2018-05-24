@extends('layouts.admin')

@section('content')
<div class="">
    <div>
        <a href="{{ route('newsfeed.create' ) }}" class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle">
            <i class="ti-plus text-white"></i>
        </a>
    </div>
</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Berita HMTI </h4>

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
                                        <th>Media</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($newsfeeds as $number => $newsfeed)
                                        <tr>
                                            <td>{{ $number+1 }}</td>
                                            <td>{{ $newsfeed->judul_berita }}</td>
                                            <td>{{ $newsfeed->foto_berita }}</td>
                                            <td>
                                                <div class="inblock" data-toggle="tooltip" data-placement="top" title="Edit Berita" >
                                                    <a href="{{ route('newsfeed.edit', $newsfeed ) }}" class=" btn btn-circle btn-secondary" >
                                                        <span class="fa fa-pencil"></span>
                                                    </a>
                                                </div>

                                                <div class="inblock" data-toggle="tooltip" data-placement="top" title="Lihat Berita" >
                                                    <a href="{{ route('newsfeed.show', $newsfeed ) }}" class=" btn btn-circle btn-secondary" >
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </div>

                                                <div class="inblock" data-toggle="tooltip" data-placement="top" title="Hapus Berita">
                                                <form id="formHapus{{$newsfeed->id}}"  action="{{ route('newsfeed.destroy', $newsfeed->id ) }}"  method="POST" >
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button data-id="{{$newsfeed->id}}" onclick="deleteData(this)" type="button" class="btn btn-danger btn-circle" >
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