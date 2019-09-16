@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست همه کاربران</h3>
                    @if(session('msg'))
                        <label style="color: #f0004c">{{session('msg')}}</label>
                    @endif
                    <div class="box-tools">
                        <div class="input-group" style="width: 200px;">
                            <form action="{{route('userSearch')}}" method="POST" style="display: flex;">
                                @csrf
                                <input type="text" name="user_search" class="form-control input-sm pull-right" placeholder="کاربر مورد نظر را بیابید ..." style="width: 150px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی کاربر</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th style="width: 11%;">تاریخ عضویت</th>
                            <th>وضعیت</th>
                            <th>دسترسی</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><?php
                                    $v = new Verta($user->created_at);
                                    $v = \Hekmatinasser\Verta\Verta::instance($user->created_at);
                                    $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                    echo $v;
                            ?></td>
                            <td><span class="label label-success">
                                   @if($user->status == 0 )
                                    غیر فعال
                                    @else()
                                     فعال
                                    @endif

                            </span></td>
                            <td><span class="label label-info">{{$user->role}}</span></td>
                            <td>
                                    <a class="label label-primary" href="{{url(route('user.edit',['user'=>$user->name]))}}">ویرایش</a>
                            </td>
                            <td>
                              @if($user->role != "admin")
                                    <form method="post" action="{{route('user.destroy',['user'=>$user])}}">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button class="btn btn-danger">حذف</button>
                                    </form>
                              @endif
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            {{$users->links()}}
        </div>
    </div>
@endsection
