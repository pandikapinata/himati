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
<div class="container m-b-30">
    <div class="row m-t-30">
        <!-- column  -->
        <div class="col-lg-5">
            <form class="m-t-40" method="POST" id="form-cart" action="{{route('cart.updateStok', $checkout[0]->id)}}">
                @csrf
                {{ method_field('PUT') }}
                <h6 class="m-b-20 font-medium">SHIPPING INFORMATION</h6>
                    @foreach($checkout as $number => $checkouts)
                    <div class="form-group">
                        <label for="exampleInputEmail1">Display Name</label>
                        <input id="nama" type="text" class="form-control" name="nama" placeholder="Enter Username" value="{{$checkouts->guest->name}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Telp</label>
                        <input id="telp" class="form-control" type="text" name="telp" placeholder="Enter Telp" value="{{$checkouts->guest->telp}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input id="email" class="form-control" type="email" name="email" placeholder="Enter email" value="{{$checkouts->guest->email}}">
                    </div>
                    @endforeach

                <button type="submit" class="btn btn-info btn-md m-t-20 ">Confirm</button>
            </form>
        </div>
        <!-- column  -->
        <div class="col-lg-6 ml-auto">
            <table class="table shop-table">
                <tr>
                    <th class="b-0">Product</th>
                    <th class="b-0">Decription</th>
                    <th class="b-0 text-right">Price</th>
                </tr>
                @foreach($checkout[0]->barang_sewa as $brg_sewa)
                @php
                    $end = \Carbon\Carbon::parse($brg_sewa->end_date);
                    $start = \Carbon\Carbon::parse($brg_sewa->start_date);
                    $length = $end->diffInDays($start);
                    if($length==0){
                        $length=1;
                    }
                @endphp
                <tr>
                    <td>
                        <img src="{{ URL::asset('assets/images/barang/' . $brg_sewa->barang->foto_barang) }}" width="200" alt="hmti" />
                    </td>
                    <td class="text-left" style="padding:15px">
                        <input name="sewa_id" type="hidden" class="form-control" value="{{$brg_sewa->sewa_id}}">
                        <h6> <b>{{$brg_sewa->barang->nama_barang}}</b></h6>
                        <h6> {{$length}} hari Sewa</h6>
                        <h6> <b>Tangal : </b></h6>
                        <h6> {{$brg_sewa->start_date}}-{{$brg_sewa->end_date}}</h6>
                        <h6> <b>Jumlah Barang : </b></h6>
                        <h6> {{$brg_sewa->qty}} Item</h6>
                    </td>
                    <td class="text-right">
                        <h5 class="font-medium m-b-30">{{$brg_sewa->harga}}</h5></td>
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
    </div>
</div>
@endsection
@section('script')
    @parent
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script>

        jQuery('#date-range').datepicker({
            toggleActive: true,
            format: 'yy-mm-dd'
        });
    </script>

@endsection