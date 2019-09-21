@include('layouts.webHeader')
@include('layouts.webSidebar')
@section('content')
    <div class="col-lg-8 col-md-12">
        <div class="blog-posts">
            <?php
                if (session('posts')){
                    ?>
                <h3 style="margin-bottom: 20px;padding: 10px;"  >
                    نتیجه جستجو شما
                </h3>
                    <?php
                    $posts = session('posts');
                }else{
                    $posts = \App\Post::latest()->paginate(3);
                }
            foreach ($posts as $post){
            ?>
                <div class="single-post">
                    <div class="image-wrapper"><img src="{{asset("public/$post->image")}}" alt="Blog Image"></div>
                    <div class="icons">
                        <div class="left-area">
                            <a class="btn caegory-btn" href="#">
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
                            <li><a href="#"><i class="ion-android-textsms"></i>{{$post->viewed}}</a></li>
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
@endsection
@include('layouts.webAside')
@include('layouts.webFooter')