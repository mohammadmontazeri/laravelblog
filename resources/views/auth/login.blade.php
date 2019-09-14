@extends('layouts.app')

@section('content'){{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}

<body class="login-page">
<div class="login-box">
    @if(session('msg'))
        <label for="" style="color: #f0004c;">{{session('msg')}}</label>
        @endif
    <div class="login-logo">
        <label for="">صفحه ورود</label>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">اطلاعات کاربری</p>
        <form action="{{route('adminPostLogin')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="ایمیل" name="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="پسورد" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn" style="border-radius: 2px;">ورود</button>
                </div><!-- /.col -->
            </div>
        </form>
        <div class="social-auth-links text-center">
            <p>- یا -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat" style="display: block;text-align: center;border-radius: 3px;">رمز عبور خود را فراموش کرده اید؟</a>
            <a href="{{route('adminRegister')}}" class="btn btn-block btn-social btn-google btn-flat" style="display: block;text-align: center;border-radius: 3px;"> تا به حال ثبت نام نکرده اید؟</a>
        </div><!-- /.social-auth-links -->

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

@endsection
