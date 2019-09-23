@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست درخواست خبرنامه ها </h3>
                    @if(session('msg'))
                        <label style="color: #fff8f8;background-color: #f0004c;border-radius: 2px;padding: 3px;">{{session('msg')}}</label>
                    @endif
                 </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th>ایمیل درخواست دهنده</th>
                            <th>تاریخ ثبت </th>
                            <th>حذف</th>
                        </tr>
                        <?php
                        foreach ($newsletters as $newsletter){
                        ?>
                        <tr>
                            <td><?php echo $newsletter['id']; ?></td>
                            <td><?php echo $newsletter['email']; ?></td>
                            <td>
                                <?php
                                $v = new Verta($newsletter->created_at);
                                $v = \Hekmatinasser\Verta\Verta::instance($newsletter->created_at);
                                $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                echo $v;
                                ?>
                            </td>
                            <td>
                                <form method="post" action="{{route('newsletter.destroy',['newsletter'=>$newsletter->id])}}">
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
            {{$newsletters->links()}}
        </div>
    </div>
@endsection