@extends('layouts.app')

@section('content'){{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}

<body class="register-page">
<div class="register-box">
    @if(session('msg'))
           <label style="color: #f0004c">{{session('msg')}}</label>

    @endif
    <div class="register-logo">
        <a href="#l"><b>صفحه </b>ثبت نام</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">
           </p>

        <form action="{{route("adminPostRegister")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Full name" name="name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <div class="col-md-6">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <div class="col-md-6">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <div class="col-md-6">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
           {{-- <div class="form-group has-feedback">
                <input type="file" class="form-control" name="image">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>--}}
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn">ثبت نام</button>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- یا -</p>
            <a href="{{route('adminLogin')}}" class="btn btn-block btn-social btn-google btn-flat" style="display: block;text-align: center;border-radius: 3px;background-color: #9f191f">قبلا ثبت نام کرده اید ؟</a>
        </div><!-- /.social-auth-links -->


    </div><!-- /.form-box -->
</div><!-- /.register-box -->

@endsection
