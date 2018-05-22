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
            <h3 class="box-title m-b-30">Form Change Password</h3>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('pass.reset') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input id="current-password" class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}" type="password" name="current-password" placeholder="Current Password" required>

                        @if ($errors->has('current-password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input id="new-password" class="form-control{{ $errors->has('new-password') ? ' is-invalid' : '' }}" type="password" name="new-password" placeholder="New Password" required>

                        @if ($errors->has('new-password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="new-password-confirm">Confirm New Password</label>
                        <input id="new-password-confirm" class="form-control{{ $errors->has('new-password-confirm') ? ' is-invalid' : '' }}" type="password" name="new-password_confirmation" placeholder="Confirm New Password" required>

                        @if ($errors->has('new-password-confirm'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('new-password-confirm') }}</strong>
                        </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-t-20 m-r-10">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection