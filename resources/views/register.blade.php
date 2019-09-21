@include('layouts.webHeader')

@section('content')
    @if(session('msg'))
        <label style="color: #f0004c">{{session('msg')}}</label>
    @endif
    <section class="reg_part">
        <div class="top">
          <span>
              ثبت نام در وب اینجا
          </span>
        </div>
        <div class="middle">
          <span>
              با ثبت نام در <span class="logo">وب اینجا</span> میتونید به رویاهای خودتون قول رسیدن بدید
          </span>
        </div>
        <div class="bottom">
              <span class="top_title">
                  مشخصات کاربر
              </span>
            <div class="member_char_box">
                <form action="{{route('adminPostRegister',['q'=>'user'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('POST')}}
                    <div class="user_char">
                      <span>
                          آدرس ایمیل
                      </span>
                        <input type="email" name="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="user_char">
                      <span>
                          نام کاربری
                      </span>
                        <input type="text" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
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
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="user_char">
                      <span>
                          تکرار رمز عبور
                      </span>
                        <input type="password" name="password_confirmation">
                    </div>
                    {{--<div class="user_char">
                      <span>
                          بارگزاری تصویر
                      </span>
                        <input type="file" name="img">
                    </div>--}}
                    <button class="btn_register" name="btn">
                        ثبت نام
                    </button>
                    <span class="login_link">
                      قبلا عضو شده اید؟ <a href="{{url(route('login'))}}">ورود</a>
                  </span>
                </form>
            </div>
        </div>
    </section>
@endsection
@include('layouts.webAside')
@include('layouts.webFooter')