@extends('layouts.web')

@section('content')
    <section class="login_part">
        <div class="top">
          <span>
              ورود به حساب کاربری
          </span>
        </div>
        <div class="middle">
          <span>
              با استفاده از <span class="logo">وب اینجا</span> به یک توسعه دهنده حرفه ای تبدیل شو
          </span>
        </div>
        <form method="post" enctype="multipart/form-data" action="{{route('user.login')}}">
            @csrf
            {{method_field('post')}}
        <div class="bottom">
              <span class="top_title">
                  مشخصات کاربر
              </span>
            @if(session('msg'))
                <span style="color: #f0004c">{{session('msg')}}</span>
            @endif
            <div class="member_char_box">
                <div class="user_char">
                      <span>
                          آدرس ایمیل
                      </span>
                    <input type="email" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="user_char">
                      <span>
                          رمز عبور
                      </span>
                    <input type="password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button class="btn_login" name="btn">
                    ورود
                </button>

            </div>

        </div>
        </form>
    </section>


@endsection