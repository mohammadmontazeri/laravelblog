@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست تبلیغات </h3>
                    @if(session('msg'))
                        <label style="color: #fff8f8;background-color: #f0004c;border-radius: 2px;padding: 3px;">{{session('msg')}}</label>
                    @endif
                    <a class="label label-warning" href="{{url(route('advertisement.create'))}}" style="float: left;padding: 7px;">افزودن تبلیغ جدید</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th>آدرس</th>
                            <th>تصویر</th>
                            <th>تاریخ ثبت </th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        <?php
                        foreach ($ads as $ad){
                        ?>
                        <tr>
                            <td><?php echo $ad['id']; ?></td>
                            <td><?php echo $ad['url']; ?></td>
                            <td>
                                <img src="{{asset("public/$ad[image]")}}" alt="" width="75px">
                            </td>
                            <td>
                                <?php
                                $v = new Verta($ad->created_at);
                                $v = \Hekmatinasser\Verta\Verta::instance($ad->created_at);
                                $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                echo $v;
                                ?>
                            </td>
                            <td>
                                <a class="label label-primary" href="{{url(route('advertisement.edit',['advertisement'=>$ad]))}}">ویرایش</a>
                            </td>
                            <td>
                                <form method="post" action="{{route('advertisement.destroy',['advertisement'=>$ad->id])}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>

                        <?php }

                        ?>

                    </table>
                </div><!-- /.box-body -->

            </div><!-- /.box -->
            {{$ads->links()}}
        </div>
    </div>
@endsection