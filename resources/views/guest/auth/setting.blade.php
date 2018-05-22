@extends('layouts.secondary')

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

<div class="row m-t-30 m-b-40 justify-content-center">
    <div class="col-md-6">
        <div class="card card-body">
            <h3 class="box-title m-b-0">Sample Basic Forms</h3>
            <p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('setting.update', $guests) }}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Display Name</label>
                            <input id="nama" type="text" class="form-control" name="nama" placeholder="Enter Username" value="{{$guests->name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">User Name</label>
                            <input id="username" class="form-control" type="text" name="username" placeholder="Enter Username" value="{{$guests->username}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Telp</label>
                            <input id="telp" class="form-control" type="text" name="telp" placeholder="Enter Telp" value="{{$guests->telp}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input id="email" class="form-control" type="email" name="email" placeholder="Enter email" value="{{$guests->email}}">
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>

                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection