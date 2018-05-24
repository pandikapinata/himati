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
                @foreach($oprecs as $number => $new)
                <!-- Column -->
                <div class="col-md-3">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <div class="oprec-card oprec-hover text-center">
                            <a href="#" class="img-ho text-center"><img class="card-img-top" src="{{ URL::asset('assets/images/oprec/' . $new->media_kegiatan) }}" alt="wrappixel kit" style="height: 330px;width: auto;"/></a>
                            <div class="card-img-overlay align-items-center">
                                <button class="btn btn-md btn-info-gradiant" data-toggle="modal" data-target="#mymodal">
                                    Daftar
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">{{$new->nama_kegiatan}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
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
    {{-- <script>
        $(function () {
            $('#mymodal').on('show.bs.modal	', function (e) {
                if(e.target.id=='mymodal'){
                    var productId = $(e.relatedTarget).data('product-id');
                    var productName = $(e.relatedTarget).data('product-name');
                    var productPrice = $(e.relatedTarget).data('product-price');
                    var productQuantity = $(e.relatedTarget).data('product-qty');

                    $('#id_barang').val(productId);
                    $('#nama_barang').val(productName);
                    $('#harga_sewa').val(productPrice);
                    $('#qty').val(productQuantity);

                }
            });


        });

        jQuery('#date-range').datepicker({
            toggleActive: true,
            format: 'yy-mm-dd'
        });
    </script> --}}

{{-- @if(session()->has('delete'))
    <script>

            $(document).ready(function(){
                deleteComplete();
            })
            function deleteComplete(){
                swal("Stok Tidak Cukup", " ", "error")
            }


    </script>
@endif --}}

@endsection