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
            <form class="m-t-40">
                <h6 class="m-b-20 font-medium">UPLOAD BUKTI PEMBAYARAN</h6>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Upload Bukti Pembayaran</label>
                        <input id="telp" class="form-control" type="file" name="telp" placeholder="Enter Telp" value="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input id="email" class="form-control" type="email" name="email" placeholder="Enter email" value="">
                    </div>

                <button type="submit" class="btn btn-info btn-md m-t-20 ">Confirm</button>
            </form>
        </div>
        <!-- column  -->
        <div class="col-lg-5 ml-auto both-space wrap-feature6-box">
            <div class="card bg-info-gradiant text-white" data-aos="fade-down" data-aos-duration="1200">
                <div class="card-body">
                    <h6 class="font-medium text-white">Notification</h6>
                    <p class="m-t-20">Lorem ipsum dolor sit amet, consecte tuam porttitor, nunc et fringilla.
                    </p>
                </div>
            </div>
            <div class="card bg-danger-gradiant text-white" data-aos="fade-left" data-aos-duration="1200">
                <div class="card-body">
                    <h6 class="font-medium text-white">Powerful Techniques</h6>
                    <p class="m-t-20">Lorem ipsum dolor sit amet, consecte tuam porttitor, nunc et fringilla.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection