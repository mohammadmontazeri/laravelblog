@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست همه کامنت ها</h3>
                    @if(session('msg'))
                        <label style="color: #f0004c">{{session('msg')}}</label>
                    @endif
                    <a class="label label-warning" href="{{url(route('comment.create'))}}" style="float: left;padding: 7px;">افزودن کامنت جدید</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th>متن</th>
                            <th>نویسنده</th>
                            <th>تاریخ ثبت </th>
                            <th>وضعیت</th>
                            <th>پست مربوطه</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                            <th>پاسخ دادن</th>
                        </tr>
                        <?php
                        foreach ($comments as $comment){
                        ?>
                        <tr>
                            <td><?php echo $comment['id']; ?></td>
                            <td><?php echo $comment['text']; ?></td>
                            <td><?php
                                $user = \App\User::where('id','=',$comment->user_id)->first();
                                echo $user->name;
                                ?></td>
                            <td>
                                <?php
                                $v = new Verta($comment->created_at);
                                $v = \Hekmatinasser\Verta\Verta::instance($comment->created_at);
                                $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                echo $v;
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($comment->status == 0)
                                {
                                    echo "<label style='color: #f0004c'>غیرفعال</label>";
                                }
                                else{
                                    echo "<label style='color: #2fa360'>فعال</label>";
                                }
                                ?>
                            </td>
                            <td><?php
                                $post = \App\Post::where('id','=',$comment->post_id)->first();
                                echo $post->title;
                                ?>
                            </td>
                            <td>
                                <?php
                                if (Auth()->user()->id == $comment->user_id){
                                ?>
                                <a class="label label-primary" href="{{url(route('comment.edit',['comment'=>$comment->id]))}}">ویرایش</a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <form method="post" action="{{route('comment.destroy',['comment'=>$comment->id])}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                            <td>
                                <a class="label label-info" href="{{url(route('replyComment',['id'=>$comment->id]))}}">پاسخ بده </a></td>
                        </tr>

                        <?php } ?>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            {{$comments->links()}}
        </div>
    </div>

@endsection