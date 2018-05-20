@extends('layouts.purchase')

@section('content')
<div class="banner-innerpage" style="background-image:url(/assets/images/banner-bg2.jpg)">
    <div class="bg-dark">
        <section class="container content-boxed">
                <div class="row items-push">
                    <div class="col-sm-7">
                        <h3 class="text-white">
                           Rental              
                        </h3>
                    </div>
                    <div class="col-sm-5 text-right hidden-xs ">
                        <ol class="breadcrumb push-10-t " style="color:#fff !important;">
                            <li class="breadcrumb-item"><a href="/" class="link-effect" style="color:#fff !important;">Beranda</a></li>
                            <li class="breadcrumb-item active">Rental</li>
                        </ol>
                    </div>
                </div>
            </section>
    </div>
</div>

<div class="container">
    <div class="row m-t-30">
        <!-- column  -->
        <div class="col-lg-12">
            <div class="d-flex m-b-40">
                <span class="align-self-center"> Results</span>
            </div>
            <div class="row shop-listing">
                <!-- column  -->
                @foreach($rents as $number => $rent)
                <div class="col-lg-4">
                    <div class="invisible">{{$number+1}}</div>
                    <div class="card shop-hover">
                        <div class="post-sewa">
                           <img src="assets/images/barang/ht.jpg" alt="wrapkit" class="img-fluid" />
                        </div>

                        <div class="card-img-overlay align-items-center">
                            <button class="btn btn-md btn-info-gradiant" data-toggle="modal" data-target="#mymodal"
                            data-product-id="{{$rent->id}}"
                            data-product-price="{{$rent->harga_sewa}}"
                            data-product-name="{{$rent->nama_barang}}"
                            data-product-qty="0" >
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <h6><a href="#" class="link">{{$rent->nama_barang}}</a></h6>
                        <!-- <h6 class="subtitle">by Nike</h6> -->
                        <h5 class="font-medium m-b-30">IDR {{$rent->harga_sewa}}</h5>
                    </div>
                </div>

                <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form  method="POST" action="{{ route('rent.barang') }}">
                                    @csrf
                                    <input name="brg_id" type="hidden" class="form-control" id="id_barang">
                                    <div class="form-group">
                                        <label for="nama_barang" class="control-label">Nama Barang</label>
                                        <input name="nama" type="text" class="form-control" id="nama_barang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="control-label">Harga Sewa</label>
                                        <input name="harga" type="text" class="form-control" id="harga_sewa" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="qty" class="control-label">Qty</label>
                                        <input name="qty" type="number" min="1" class="form-control" id="qty"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hari" class="control-label">Hari</label>
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" name="startdate" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info b-0 text-white">TO</span>
                                            </div>
                                            <input type="text" class="form-control" name="enddate" required>
                                        </div>
                                        {{-- <input name="hari" type="number" min="1" class="form-control" id="hari"> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                    <!-- /.modal -->
                @endforeach
                <!-- column  -->
            </div>
        </div>
        <!-- column  -->
        {{-- <div class="col-lg-3">
            <!-- widget  -->
            <div class="m-b-40">
                <div class="d-flex no-block font-13 icon-list-no-animation" >
                    <div class="preview">
                        <h5 class="title m-b-10"><i class="icon-Shopping-Cart m-l-0"></i><span>Keranjang Sewa</span></h5>
                    </div>
                </div>
                <table class="table table_summary" id="append1">

                </table>
                <table class="table table_summary">
                    <tbody>
                    <tr>
                        <td class="total">
                            <span class="pull-right btext font-medium" id="total">TOTAL</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- widget  -->
        </div> --}}
        <!-- column  -->
    </div>
</div>
@endsection
@section('script')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script>
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
    </script>

@endsection