@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست همه کاربران</h3>
                    <div class="box-tools">
                        <div class="input-group" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی کاربر</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>تصویر</th>
                            <th style="width: 11%;">تاریخ عضویت</th>
                            <th>وضعیت</th>
                            <th>دسترسی</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        @foreach($users as $user)
                            <?php

                            ?>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><img src="{{asset("public".$user->img)}}" style="width: 50px;height: 50px;"></td>
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
                                @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
                                    @if(\Illuminate\Support\Facades\Auth::user()->super_admin == 1)
                                    @else
                                        <a class="label label-primary" href="{{route('user.edit',['user'=>$user])}}">ویرایش</a>
                                    @endif
                                @endif
                                @can('update',\Illuminate\Support\Facades\Auth::user())
                                    <a class="label label-primary" href="{{url(route('user.edit',['user'=>$user]))}}">ویرایش</a>
                                @endcan

                            </td>
                            <td>
                               <form method="post" action="{{route('user.destroy',['user'=>$user])}}">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                    @can('update',\Illuminate\Support\Facades\Auth::user())
                                        <button class="btn btn-danger">حذف</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@endsection
