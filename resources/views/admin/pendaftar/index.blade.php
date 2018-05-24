@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Pendaftar Kegiatan HMTI </h4>
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
                                    <th>Jumlah Pendaftar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($oprecs as $number => $oprec)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <td>{{ $oprec->nama_kegiatan }}</td>
                                        <td>{{ $oprec->pendaftaran->count()}}</td>
                                        <td>
                                        <div class="inblock" >
                                            <a href="{{ route('pendaftar.detail', $oprec ) }}" class="btn btn-circle btn-secondary" >
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
