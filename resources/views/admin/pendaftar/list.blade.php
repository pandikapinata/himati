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
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>ID LINE</th>
                                    <th>Telp</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($oprecs->pendaftaran as $number => $oprec)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <td>{{ $oprec->guest->username }}</td>
                                        <td>{{ $oprec->guest->name }}</td>
                                        <td>{{ $oprec->user_line }}</td>
                                        <td>{{ $oprec->no_telp }}</td>
                                        <td>{{ $oprec->alasan }}</td>
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
