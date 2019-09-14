@extends('layouts.admin')


@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">

            <h3 class="box-title">ویرایش اطلاعات کاربر</h3>
            @if(session('msg'))
                <label style="color: #f0004c;margin-right: 25px;">{{session('msg')}}</label>
            @endif
        </div><!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{route('user.update',['user'=>$user])}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ویرایش نام کاربری</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}"  placeholder="نام کاربری خود را ویرایش کنید">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ویرایش رمز عبور</label>
                    <input type="password" class="form-control" name="password" placeholder="رمز عبور جدید را وارد کنید">
                </div>
                {{--<div class="form-group">
                    <label for="exampleInputPassword1">ویرایش دسترسی</label>
                    <select name="role">
                        <option value="admin" @if(($user->role)== "admin") selected @endif >admin</option>
                        <option value="user"  @if(($user->role)== "user") selected @endif >user</option>
                    </select>
                </div>--}}
                <hr>
                <label>وضعیت کاربر</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" @if(($user->status) == 1) checked @endif>
                    <label class="form-check-label" for="exampleRadios1">
                        فعال
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" @if(($user->status) == 0) checked @endif>
                    <label class="form-check-label" for="exampleRadios2">
                        غیر فعال
                    </label>
                </div>
                <hr>
                {{-- <div class="form-group">
                     <label for="exampleInputFile">ویرایش تصویر</label>
                     <input type="file" id="exampleInputFile" name="img">
                     <img src="{{asset("public".$user->img)}}" style="width: 50px;height: 50px;">
                 </div>--}}
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ویرایش</button>
            </div>
        </form>
    </div><!-- /.box -->
@endsection