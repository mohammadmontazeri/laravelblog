@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست همه پست ها</h3>
                    @if(session('msg'))
                        <label style="color: #f0004c">{{session('msg')}}</label>
                    @endif
                    <a class="label label-warning" href="{{url(route('post.create'))}}" style="float: left;padding: 7px;">افزودن پست جدید</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th>عنوان</th>
                            <th>خلاصه</th>
                            <th>تاریخ ثبت </th>
                            <th>دسته بندی</th>
                            <th>محتوای پست</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                       @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>
                                <?php
                                    $sum = substr($post['summery'],0,20);
                                    echo $summery = $sum."...";
                                ?>
                            </td>
                            <td><?php
                                $v = new Verta($post->created_at);
                                $v = \Hekmatinasser\Verta\Verta::instance($post->created_at);
                                $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                echo $v;
                                ?>
                            </td>
                            <td>
                               <?php
                                    $cat = \App\Category::where('id','=',$post->cat_id)->first();
                                    echo $cat->name;
                                ?>
                            </td>
                            <td><a class="label label-info" href="{{route('postDetail',['detail' => $post])}}">متن پست</a></td>
                            <td>
                                <a class="label label-primary" href="{{url(route('post.edit',['post'=>$post->id]))}}">ویرایش</a>
                            </td>
                            <td>
                                <form method="post" action="{{route('post.destroy',['post'=>$post->id])}}">
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
            {{$posts->links()}}
        </div>
    </div>

@endsection