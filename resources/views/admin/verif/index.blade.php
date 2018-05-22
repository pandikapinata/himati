@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Verif Sewa HMTI </h4>
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
                                    <th>Tgl Pesan</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($verifs as $number => $verif)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <td>{{ $verif->guest->name }}</td>
                                        <td>{{ $verif->tgl_pesan }}</td>
                                        <td>{{ $verif->total_bayar }}</td>
                                        <td>
                                        <div class="inblock" >
                                            <a href="{{ route('verif.show', $verif ) }}" class="btn btn-circle btn-secondary" >
                                                <span class="fa fa-eye"></span>
                                            </a>
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