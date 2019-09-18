@extends('layouts.admin')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">ویرایش اطلاعات</h3>
            @if(session('msg'))
                <label style="color: #f0004c">{{session('msg')}}</label>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="list-style-type: none">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div><!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="{{route('about.update',['about'=> $about->id])}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">نام</label>
                    <input type="text" class="form-control" name="name"  value="{{$about->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ایمیل</label>
                    <input type="text" class="form-control" name="email"  value="{{$about->email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تلفن همراه</label>
                    <input type="text" class="form-control" name="phoneNumber"  value="{{$about->phoneNumber}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">اینستاگرام</label>
                    <input type="text" class="form-control" name="instaUrl"  value="{{$about->instaUrl}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تلگرام</label>
                    <input type="text" class="form-control" name="tellId"  value="{{$about->tellId}}">
                </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">درباره من</label>
                    <textarea class="form-control" id="editor1"  name="detail">{{$about->detail}}
                </textarea>
                </div>
                <hr>
                
                <hr>
                <div class="form-group">
                    <label for="exampleInputFile">تصویر شاخص</label>
                    <input type="file" id="exampleInputFile" name="image">
                    <img src="{{asset("public/$about->image")}}" alt="" width="75px">
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btn">ویرایش</button>
            </div>
        </form>
    </div><!-- /.box -->



@endsection