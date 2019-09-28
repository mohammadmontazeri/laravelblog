@include('layouts.webHeader')
@include('layouts.webSidebar')
@section('content')

    <div class="col-lg-8 col-md-12">
        <div class="blog-posts">
            <div class="single-post">
                <div class="image-wrapper"><img src="{{asset("public/$post->image")}}" alt="Blog Image"></div>
                <div class="icons">
                    <div class="left-area">
                        <a class="btn caegory-btn" href="{{url(route('showPosts',['id'=>$post->cat_id]))}}"><b>{{$post->category->name}}</b></a>
                    </div>
                    <ul class="right-area social-icons">
                        <li class="like" style="cursor: pointer;" data-test = "{{$post->id}}">
                            <?php
                            if (\Illuminate\Support\Facades\Auth::check()){
                                $like = \App\Like::where('user_id','=',Auth()->user()->id)->
                                where('post_id','=',$post->id)->first();
                                $likeNum = \App\Like::where('post_id','=',$post->id)->get();
                                $num = count($likeNum);
                                if ($like){
                                    echo "<i class='ion-heart p-$post->id' style='color: #f0004c'></i> "."<label class='count-$post->id'>$num</label>";
                                }else{
                                    echo "<i class='ion-ios-heart-outline p-$post->id' ></i>"."<label class='count-$post->id'>$num</label>";
                                }
                            }else{
                                $likeNum = \App\Like::where('post_id','=',$post->id)->get();
                                $num = count($likeNum);
                                echo "<i class='ion-ios-heart-outline p-$post->id' ></i>"."<label class='count-$post->id'>$num</label>";
                            }
                            ?>
                        </li>
                        <li><a><i class="ion-android-textsms"></i><?php echo count($post->comments)?></a></li>
                    </ul>
                </div>
                <p class="date"><em>
                        <?php
                        $v = new Verta($post->created_at);
                        $v = \Hekmatinasser\Verta\Verta::instance($post->created_at);
                        $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                        echo $v;
                        ?>
                    </em></p>
                <h3 class="title"><a><b class="light-color">{{$post->title}}</b></a></h3>
                {!! $post->detail !!}
                <ul>
                    <?php
                        $con = \App\Post::where('id','=',$post->id)->get()->first();
                        $tags = explode(',',$con->tags);
                        foreach ($tags as $tag){
                            $tag_id = \App\Tag::where('name',$tag)->get()->first();
                            $id = $tag_id->id;
                            ?>
                        <li><a class="btn" href="{{url(route('showPostTag',['id'=>$id]))}}">{{$tag}}</a></li>
                    <?php
                            }
                     ?>
                </ul>

            </div><!-- single-post -->


                <h4 class="title"><b class="light-color">نظرات</b></h4>
    <?php

                            function dateTime($input)
                            {
                                $v = new Verta($input->created_at);
                                $v = \Hekmatinasser\Verta\Verta::instance($input->created_at);
                                $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                echo $v;
                            }
                            function parent($parent, $post_id)
                            {
                                $parents = \App\Comment::where('parent','=',$parent)->get();
                                echo "<ul style='margin-right: 10px;display: flex;flex-direction: column'>";

                                foreach ($parents as $par) {
                                    if ($par['status'] == "1") {
                                        echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #eeeeee;'>$par[text]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>" . $par->user->name . "</span>" . "</li><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>" . dateTime($par) . "</span>";
                                        if ($par['is_parent'] == "1") {
                                            parent($par['id'], $post_id);
                                        }
                                    }
                                }


                                echo "</ul>";
                            }

                            function ch($comments, $post)
                            {
                                echo "<ul style='display:flex;flex-direction: column'>";
                                foreach ($comments as $key => $item) {
                                    if (($item['parent'] == "") && ($item['is_parent'] == "1") && ($item['status'] == "1")) {
                                        echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #FFF;'>$item[text]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>" . $item->user->name . "</span>" . "</li><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>" . dateTime($item) . "</span>";
                                        parent($item['id'], $post['id']);
                                    }
                                    if (($item['parent'] == "") && ($item['is_parent'] == "0") && ($item['status'] == "1")) {
                                        echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #FFF;'>$item[text]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>" . $item->user->name . "</span>" . "</li><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>" . dateTime($item) . "</span>";
                                    }
                                }
                                echo "</ul>";
                            }
                            ch($post->comments, $post);

                            ?>


            @if(\Illuminate\Support\Facades\Auth::check())
                @if(session('msg'))
                    <label style="color: #fff; background-color: #9f191f;border-radius: 2px;padding: 3px;">{{session('msg')}}</label>
                    @endif
                <div class="leave-comment-area">
                    <h4 class="title"><b class="light-color">ثبت نظرات</b></h4>
                    <div class="leave-comment">
                        <form method="post" action="{{route('commentStore',['user_id'=>Auth()->user()->id,'post_id'=>$post->id])}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea name="text" class="message-input" rows="6" style="font-family: main, sans-serif" placeholder="متن مورد نظر مورد را  از اینجا وارد کنید..."></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-2" style="font-family: main, sans-serif"><b>ثبت و ارسال </b></button>
                                </div>
                            </div><!-- row -->
                        </form>
                    </div><!-- leave-comment -->

                </div><!-- comments-area -->


            @else
                <div class="alert alert-danger" role="alert" style="margin-top: 100px;">
                    برای ارسال نظر و دیدگاه ابتدا باید وارد سایت شوید
                </div>
            @endif
        </div><!-- blog-posts -->
    </div><!-- col-lg-4 -->

@endsection
@include('layouts.webAside')
@include('layouts.webFooter')
