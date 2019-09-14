@extends('layouts.admin')

@section('content')
                    @if(isset($msg))
                        <label style="color: #f0004c">{{$msg}}</label>
                    @else
                        @if(empty($users[0]))
                            <label style="color: #f0004c">کاربر مورد نظر یافت نشد !</label>
                        @else

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">کاربران یافت شده</h3>
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
                                                            /* $v = new Verta($user->created_at);
                                                             $v = \Hekmatinasser\Verta\Verta::instance($user->created_at);
                                                             $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                                             echo $v;*/
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
                                                            <a class="label label-primary" href="{{url(route('user.edit',['user'=>$user->id]))}}">ویرایش</a>
                                                        </td>
                                                        <td>
                                                            @if($user->role != "admin")
                                                                <form method="post" action="{{route('user.destroy',['user'=>$user->id])}}">
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
                                </div>
                            </div>
                        @endif

                    @endif


@endsection
