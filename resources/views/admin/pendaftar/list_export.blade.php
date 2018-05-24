<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h4 class="card-title col-lg-11">Tabel Verif Sewa HMTI $data</h4>
                </div>
                    <div class="table-responsive">
                        <table id="example" class="table">
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
                                    {{-- @foreach($oprecs->pendaftaran as $number => $oprec)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <td>{{ $oprec->guest->username }}</td>
                                        <td>{{ $oprec->guest->name }}</td>
                                        <td>{{ $oprec->user_line }}</td>
                                        <td>{{ $oprec->no_telp }}</td>
                                        <td>{{ $oprec->alasan }}</td>
                                    </tr>
                                    @endforeach --}}
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
