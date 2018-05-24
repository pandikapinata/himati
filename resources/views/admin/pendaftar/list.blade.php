@extends('layouts.admin')
@section('title', 'Kegiatan ' . $oprecs->nama_kegiatan)

@section('content')
<div class="row">
<input type="hidden" id="oprec_nama" value="{{$oprecs->nama_kegiatan}}">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h4 class="card-title col-lg-11">Tabel Pendaftar Oprec HMTI </h4>
                </div>
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
                @endif
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>ID LINE</th>
                                    <th>Telp</th>
                                    <th>Sie Pilihan</th>
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
                                        <td>{{ $oprec->sie_pilihan }}</td>
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
@section('script')
@parent
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script>
$(document).ready(function() {
    //var Id = $(e.relatedTarget).data('id');
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [{
            extend: 'pdfHtml5',
            // title: function () {
            //     return $('#oprec-nama').val();
            //     alert();
            // },
            title: 'Kegiatan ' + '\n' + $("#oprec_nama").val(),
        }]
    } );
} );
</script>
@endsection
