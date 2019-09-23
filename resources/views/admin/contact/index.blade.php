@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست تماس ها</h3>
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
                            <th>متن پیام</th>
                            <th>تاریخ ثبت</th>
                            <th>حذف</th>
                        </tr>

                       @foreach($contacts as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->message}}</td>
                            <td>
                                <?php
                                $v = new Verta($value->created_at);
                                $v = \Hekmatinasser\Verta\Verta::instance($value->created_at);
                                $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                echo $v;
                                ?>
                            </td>
                            <td>
                                <form method="post" action="{{route('contact.destroy',['contact'=>$value])}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            {{$contacts->links()}}
        </div>
    </div>

@endsection