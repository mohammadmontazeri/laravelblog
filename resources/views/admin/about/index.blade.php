@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">مشخصات من</h3>
                    @if(session('msg'))
                        <label style="color: #f0004c">{{session('msg')}}</label>
                    @endif
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>تصویر </th>
                            <th>شماره همراه</th>
                            <th>آدرس اینستاگرام</th>
                            <th>آدرس تلگرام</th>
                            <th>درباره من</th>
                            <th>حذف</th>
                        </tr>

                       @foreach($about as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>
                                <img src="{{asset("public/$value->image")}}" width="75px">
                            </td>
                            <td>{{$value->phoneNumber}}</td>
                            <td>{{$value->instaUrl}}</td>
                            <td>{{$value->tellId}}</td>
                            <td><a class="label label-info" href="{{route('aboutDetail',['detail' => $value])}}">درباره من</a></td>
                            <td>
                                <a class="label label-primary" href="{{url(route('about.edit',['about'=>$value->id]))}}">ویرایش</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

@endsection