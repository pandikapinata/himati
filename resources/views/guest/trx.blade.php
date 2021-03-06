@extends('layouts.purchase')

@section('content')
<div class="banner-innerpage" style="background-image:url(/assets/images/banner-bg2.jpg)">
    <div class="bg-dark">
        <section class="container content-boxed">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h3 class="text-white">
                        Bukti Pembayaran
                    </h3>
                </div>
                <div class="col-sm-5 text-right hidden-xs ">
                    <ol class="breadcrumb push-10-t " style="color:#fff !important;">
                        <li class="breadcrumb-item"><a href="/" class="link-effect" style="color:#fff !important;">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="/" class="link-effect" style="color:#fff !important;">Kerajang Sewa</a></li>
                        <li class="breadcrumb-item"><a href="/" class="link-effect" style="color:#fff !important;">Checkout</a></li>
                        <li class="breadcrumb-item active">Bukti Pembayaran</li>
                    </ol>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="container m-b-30">
    <div class="row m-t-30">
        <!-- column  -->
        <div class="col-lg-5">
            <form class="m-t-40" method="POST" action="{{route('transaksiUpload', $sewa[0]->id)}}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <h6 class="m-b-20 font-medium">UPLOAD BUKTI PEMBAYARAN</h6>
                    <div class="form-group">
                        <label>Upload Bukti Pembayaran</label>
                        <input id="bukti_pembayaran" class="form-control" type="file" name="bukti" required>
                    </div>
                    <small class="text-danger">Maks. Ukuran File 2MB</small>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea id="keterangan" class="form-control" rows="5" name="keterangan" required></textarea>
                    </div>

                <button type="submit" class="btn btn-info btn-md m-t-20 ">Confirm</button>
            </form>
        </div>
        <!-- column  -->
        <div class="col-lg-5 ml-auto both-space wrap-feature6-box">
            <div class="card bg-info-gradiant text-white" data-aos="fade-down" data-aos-duration="1200">
                <div class="card-body">
                    <h6 class="font-medium text-white">Notification</h6>
                <p class="m-t-20">Silahkan melakukan pembayaran dengan transfer ke Bank .... sejumlah <b>Rp. {{$total_harga}}</b> ke No.
                        Rekening <b>9019201290 a.n. Wayan.</b> Batas pembayaran ... hari dari tanggal penyewaan.
                    </p>
                    <p class="m-t-20">
                        Jika sudah melakukan transfer, silahkan hubungi admin <b>089121212</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection