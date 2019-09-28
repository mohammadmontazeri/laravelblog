@include('layouts.webHeader')
@include('layouts.webSidebar')
@section('content')
    <div class="col-lg-8 col-md-12">
        <div class="blog-posts">

            @if(session('msg'))
                <div class="col-lg-8 col-md-12" style="direction: rtl;background-color: #f0004c;color: #fff;">
                    {{session('msg')}}
                </div>
            @else
                <?php
                // \Illuminate\Support\Facades\Session::forget('tag');
                //\Illuminate\Support\Facades\Session::forget('tag_');
                //\Illuminate\Support\Facades\Session::flush();
                if (session('tag')||session('tag_')){
                //\Illuminate\Support\Facades\Session::flush();die;
                ?>
                <h3 style="margin-bottom: 20px;padding: 10px;">
                    نتیجه جستجو شما
                </h3>
                <?php
                /*if (session('tag_')==""){
                    \Illuminate\Support\Facades\Session::put('tag_',session('tag'));
                }
                $session_tag = session('tag_');
                $posts = \App\Post::where('tags','like',$session_tag)->latest()->paginate(2);

                }elseif (session('category')||session('category_')){
                    if (session('category_')==""){
                        \Illuminate\Support\Facades\Session::put('category_',session('category'));
                    }
                    $session_cat = session('category_');
                    $posts = \App\Post::whereIn('cat_id',$session_cat)->latest()->paginate(1);
                }
                elseif (session('title')||session('title_')){
                    if (session('title_')==""){
                        \Illuminate\Support\Facades\Session::put('title_',session('title'));
                    }
                    $session_title = session('title_');
                    $posts = $session_title;
                }elseif (session('post')||session('post_')){
                    if (session('post_')==""){
                        \Illuminate\Support\Facades\Session::put('post_',session('post'));
                    }
                    $session_post = session('post_');
                    $posts = $session_post;
                }*/

                }
                foreach ($posts as $post){
                ?>
                <div class="single-post">
                    <div class="image-wrapper"><img src="{{asset("public/$post->image")}}" alt="Blog Image"></div>
                    <div class="icons">
                        <div class="left-area">
                            <a class="btn caegory-btn" href="{{url(route('showPosts',['id'=>$post->cat_id]))}}">
                                <b>
                                    <?php
                                    $cat = \App\Category::where('id','=',$post->cat_id)->first();
                                    echo $cat->name;
                                    ?>
                                </b>
                            </a>
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
                            <li><a><i class="ion-android-textsms"></i><?php //echo count($post->comments)?></a></li>
                        </ul>
                    </div>
                    <p class="date" style="font-family: main, sans-serif"><em><?php
                            $v = new Verta($post->created_at);
                            $v = \Hekmatinasser\Verta\Verta::instance($post->created_at);
                            $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                            echo $v;
                            ?></em></p>
                    <h3 class="title"><a href="{{url(route('postDetail',['id'=>$post->id]))}}"><b class="light-color">{{$post->title}}</b></a></h3>
                    <p style="font-family: main, sans-serif">{{$post->summery}}</p>
                    <a class="btn read-more-btn" href="{{url(route('postDetail',['id'=>$post->id]))}}" style="font-family: main, sans-serif"><b>بیشتر بخوانید</b></a>
                </div><!-- single-post -->
                <hr>
                <?php
                }
                ?>
        </div><!-- blog-posts -->
        {{$posts->links()}}
    </div><!-- col-lg-4 -->
    @endif

@endsection
@include('layouts.webAside')
@include('layouts.webFooter')
