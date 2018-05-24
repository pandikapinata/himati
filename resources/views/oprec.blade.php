@extends('layouts.secondary')

@section('content')
<div class="banner-innerpage" style="background-image:url(/assets/images/banner-bg2.jpg)">
    <div class="bg-dark">
        <section class="container content-boxed">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h3 class="text-white">
                        List Open Requirement
                    </h3>
                </div>
                <div class="col-sm-5 text-right hidden-xs ">
                    <ol class="breadcrumb push-10-t " style="color:#fff !important;">
                        <li class="breadcrumb-item"><a href="/" class="link-effect" style="color:#fff !important;">Beranda</a></li>
                        <li class="breadcrumb-item active">List Open Requirement</li>
                    </ol>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="spacer bg-light">
    <div class="container">
        <!-- Row  -->
        <div class="row oprec-listing">
            @foreach($oprecs as $number => $oprec)
            <!-- Column -->
            <div class="col-md-3">
                <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                    <div class="oprec-card oprec-hover text-center">
                        <a href="#" class="img-ho text-center"><img class="card-img-top" src="{{ URL::asset('assets/images/oprec/' . $oprec->media_kegiatan) }}" alt="wrappixel kit" style="height: 330px;width: auto;"/></a>
                        <div class="card-img-overlay align-items-center">
                            <button class="btn btn-md btn-info-gradiant" onclick="regisForm({{$oprec->id}})">
                                Daftar
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="font-medium m-b-0">{{$oprec->nama_kegiatan}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="modal fade" id="modalregis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                    <form method="POST" id="form-cart" action="{{route('openReq.save')}}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <input name="oprec_id" type="hidden" class="form-control" id="oprec_id">
                    <input name="guest_id" type="hidden" class="form-control" id="guest_id">
                    <div class="form-group">
                        <label for="nama_kegiatan" class="control-label">Nama Kegiatan</label>
                        <input name="nama_kegiatan" type="text" class="form-control" id="nama_kegiatan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nim" class="control-label">NIM</label>
                        <input name="nim" type="text" class="form-control" id="nim" readonly>
                    </div>
                    <div class="form-group">
                        <label for="guest_nama" class="control-label">Nama</label>
                        <input name="guest_nama" type="text" class="form-control" id="guest_nama"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="telp" class="control-label">No. Telp</label>
                        <input name="telp" type="text" class="form-control" id="telp"  required>
                    </div>
                    <div class="form-group">
                        <label for="id_line" class="control-label">ID LINE</label>
                        <input name="id_line" type="text" class="form-control" id="id_line"  required>
                    </div>

                    <div class="form-group">
                        <label for="sie" class="control-label">Sie Pilihan</label>
                        <select id="sie" name="sie" class="form-control" required>
                            <option value=" ">-- Pilih Sie  --</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alasan" class="control-label">Alasan Singkat</label>
                        <textarea id="alasan" class="form-control" rows="4" name="alasan" required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button id="save_regis" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')
    @parent
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script>

        function regisForm(id) {
            //save_method = 'edit';
            // $('input[name=_method]').val('PUT');
            $('#modalregis form')[0].reset();
            $.ajax({
            url: "{{ url('open-requirement') }}" + '/' + id  + "/form" ,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                //alert(data['oprecs'][0]['oprec_id'])
                $('#modalregis').modal('show');
                $('.modal-title').text('Regis Form');
                $('#oprec_id').val(data['oprecs'][0]['oprec_id']);
                $('#guest_id').val(data.guest.id);
                $('#nama_kegiatan').val(data['oprecs'][0]['nama_kegiatan']);
                $('#nim').val(data.guest.username);
                $('#guest_nama').val(data.guest.name);
                $('#telp').val(data.guest.telp);

                var sie_option = '';
                var opened_sie = data['oprecs'].length;

                for(var i = 0; i < opened_sie; i++){
                    sie_option += "<option value='" + data['oprecs'][i]['nama_sie'] + "'>"+ data['oprecs'][i]['nama_sie'] +"</option>"
                }

                $('#sie').append(sie_option);

            },
            error : function() {
                alert("Nothing Data");
            }
            });
        }

        // $(function () {
        //     $('#modalregis').on('show.bs.modal	', function (e) {
        //         if(e.target.id=='modalregis'){
        //             var Id = $(e.relatedTarget).data('id');
        //             var Name = $(e.relatedTarget).data('nama-kegiatan');
        //             var guestId = $(e.relatedTarget).data('guest-id');
        //             var guestNama = $(e.relatedTarget).data('guest-nama');
        //             var guestNim = $(e.relatedTarget).data('guest-nim');
        //             var guestTelp = $(e.relatedTarget).data('guest-telp');


        //             $('#oprec_id').val(Id);
        //             $('#nama_kegiatan').val(Name);
        //             $('#guest_id').val(guestId);
        //             $('#nim').val(guestNim);
        //             $('#guest_nama').val(guestNama);
        //             $('#telp').val(guestTelp);
        //             // $('#sie').val(data.oprec_sie.sie_id);

        //         }
        //     });



    </script>

@endsection