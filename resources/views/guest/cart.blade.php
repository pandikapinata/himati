@extends('layouts.purchase')

@section('content')
<div class="banner-innerpage" style="background-image:url(/assets/images/banner-bg2.jpg)">
    <div class="container">
        <!-- Row  -->
        <div class="row justify-content-center ">
            <!-- Column -->
            <div class="col-md-6 align-self-center text-center" data-aos="fade-down" data-aos-duration="1200">
                <h1 class="title">Blog Detail Page</h1>
                <h6 class="subtitle op-8">We are Small Team of Creative People working together</h6> </div>
            <!-- Column -->
        </div>
    </div>
</div>
<div class="spacer">
    <div class="container">
        <div class="row m-t-30">
            <!-- column  -->
            <div class="col-lg-12 ml-auto">
            <form method="POST" id="form-cart" action="{{route('cart.checkout', $cart[0]->sewa_id)}}">
                @csrf
                {{ method_field('PUT') }}

                <div id="table_cart" class="table-responsive">
                <table id="myTable" class="table shop-table">
                    <tr>
                        <th class="b-0">Barang</th>
                        <th class="b-0 text-left">Deskripsi</th>
                        <th class="b-0 text-right">Action</th>
                        <th class="b-0 text-right">Price</th>
                    </tr>
                    @foreach($cart as $number => $carts)
                    @php
                        $end = \Carbon\Carbon::parse($carts->end_date);
                        $start = \Carbon\Carbon::parse($carts->start_date);
                        $length = $end->diffInDays($start);
                        if($length==0){
                            $length=1;
                        }
                    @endphp
                    <tr>
                        <td>
                            <img src="{{ URL::asset('assets/images/barang/' . $carts->barang->foto_barang) }}" width="200" alt="hmti" />
                        </td>
                        <td class="text-left" style="padding:15px">
                            <input name="total_harga" type="hidden" class="form-control" value="{{$total_harga}}">
                            <h6> <b>{{$carts->barang->nama_barang}}</b></h6>
                            <h6> {{$length}} hari Sewa</h6>
                            <h6> <b>Tangal : </b></h6>
                            <h6> {{$carts->start_date}}-{{$carts->end_date}}</h6>
                            <h6> <b>Jumlah Barang : </b></h6>
                            <h6> {{$carts->qty}} Item</h6>
                        </td>
                        <td class="text-right">
                            <div class="inblock">
                                <button  onclick="editForm({{$carts->id}})" type="button" class="btn btn-success m-b-20">
                                    <span class="fas fa-edit">
                                </button>
                            </div>
                            <div class="inblock">
                                <button  onclick="deleteData({{$carts->id}})" type="button" class="btn btn-danger m-b-20">
                                    <span class="fas fa-trash-alt">
                                </button>
                            </div>
                        </td>
                        <td class="text-right">
                            <h5 class="font-medium m-b-30">{{$carts->harga}}</h5></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <div class="d-flex">
                                <span>Total</span>
                                <h5 name="total_harga" class="font-medium m-b-30 ml-auto">{{$total_harga}}</h5>
                            </div>
                        </td>
                    </tr>
                </table>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-info btn-md m-t-20" >Checkout</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-cart">
                    @csrf
                    {{ method_field('PATCH') }}
                    <input name="cart_id" type="hidden" class="form-control" id="id_barang">
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
                            <input type="text" class="form-control" name="start_date" id="start_date" required>
                            <div class="input-group-append">
                                <span class="input-group-text bg-info b-0 text-white">TO</span>
                            </div>
                            <input type="text" class="form-control" name="end_date" id="end_date" required>
                        </div>
                        {{-- <input name="hari" type="number" min="1" class="form-control" id="hari"> --}}
                    </div>
                    <div class="modal-footer">
                        <button id="tai" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')
    @parent
    <script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>

        function editForm(id) {
            //save_method = 'edit';
            $('input[name=_method]').val('PUT');
            $('#modaledit form')[0].reset();
            $.ajax({
            url: "{{ url('rental/cart') }}" + '/' + id  + "/edit" ,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modaledit').modal('show');
                $('.modal-title').text('Edit Cart');
                $('#id_barang').val(data.id);
                $('#nama_barang').val(data.barang.nama_barang);
                $('#harga_sewa').val(data.harga);
                $('#qty').val(data.qty);
                $('#start_date').val(data.start_date);
                $('#end_date').val(data.end_date);
            },
            error : function() {
                alert("Nothing Data");
            }
            });
        }

        $('#tai').click(function(){
                //alert('wkwkwk');
                var id = $('#id_barang').val();
                $.ajax({
                    //alert(url);
                    url:"{{ url('rental/cart') }}" + '/' + id ,
                    type : "POST",
//                        data : $('#modal-form form').serialize(),
                    data: new FormData($("#modaledit form")[0]),
                    contentType: false,
                    processData: false,
                    success : function(data) {
                        $('#modaledit').modal('hide');
                        //alert('wkwkwk');
                        location.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function(data){
                        swal({
                            title: 'Stok Tidak Cukup',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
                return false;
        });

        function deleteData(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          },(function () {
              //alert("KWKWKWKW");
              $.ajax({
                  url : "{{ url('rental/cart') }}" + '/' + id ,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},

                  success : function(data) {
                        location.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
          }));
        }

        jQuery('#date-range').datepicker({
            toggleActive: true,
            format: 'yy-mm-dd'
        });
    </script>
    @if(session()->has('delete'))
    <script>

            $(document).ready(function(){
                deleteComplete();
            })
            function deleteComplete(){
                swal("Stok Tidak Cukup", " ", "error")
            }


    </script>
    @endif

@endsection