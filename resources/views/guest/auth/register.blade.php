@extends('layouts.auth')

@section('content')
    <div class="spacer form2">
        <div class="container">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-6 p-r-40" data-aos="fade-right" data-aos-duration="1200">
                    <img src="{{asset('assets/images/logo.png')}}" class="img-responsive" alt="HMTI" />
                </div>
                <div class="col-lg-6">
                    <div class="text-box" data-aos="fade-left" data-aos-duration="1200">
                        <h1 class="font-light">Register akun HMTI.</h1>
                        <p>Register Page Guest</p>

                        <form class="m-t-20" data-aos="fade-left" data-aos-duration="1200" method="POST" action="{{ url('/guest/register') }}">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="username" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
                                        @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="name" placeholder="Your Name" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" type="password" name="password_confirmation" placeholder="Confirm Password" required>

                                        @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 d-flex">
                                    <button type="submit" class="btn btn-md btn-outline-style"><span> Register </span></button>
                                    <div class="have-ac ml-auto align-self-center">Sudah memiliki akun? <a href="{{url('guest/login')}}" class="text-primary"> Login!</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
