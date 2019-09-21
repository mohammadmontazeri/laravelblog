@include('layouts.webHeader')
@include('layouts.webSidebar')
@section('content')
    <div class="col-lg-8 col-md-12">
        <div class="blog-posts">

            <div class="single-post">
                <div class="image-wrapper"><img src="{{asset("public/$post->image")}}" alt="Blog Image"></div>

                <div class="icons">
                    <div class="left-area">
                        <a class="btn caegory-btn" href="#"><b>{{$post->category->name}}</b></a>
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
                        <li><a href="#"><i class="ion-android-textsms"></i></a></li>
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
                <h3 class="title"><a href="#"><b class="light-color">{{$post->title}}</b></a></h3>
                {!! $post->detail !!}
                <ul>
                    <li><a class="btn" href="#">design</a></li>
                    <li><a class="btn" href="#">fashion</a></li>
                </ul>

            </div><!-- single-post -->

            <div class="comments-area">
                <h4 class="title"><b class="light-color">2 Comments</b></h4>
                <div class="comment">
                    <div class="author-image"><img src="images/author-2-150x150.jpg" alt="Autohr Image"></div>
                    <div class="comment-info">
                        <h5><b class="light-color">William Smith</b></h5>
                        <h6 class="date"><em>Monday, October 30, 2017</em></h6>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            dolore magnam aliquam quaerat voluptatem.</p>
                    </div>
                </div><!-- comment -->

                <div class="comment">
                    <div class="author-image"><img src="images/author-3-150x150.jpg" alt="Autohr Image"></div>
                    <div class="comment-info">
                        <h5><b class="light-color">William Smith</b></h5>
                        <h6 class="date"><em>Monday, October 30, 2017</em></h6>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            dolore magnam aliquam quaerat voluptatem.</p>
                    </div>
                </div><!-- comment -->

            </div><!-- comments-area -->

            <div class="leave-comment-area">
                <h4 class="title"><b class="light-color">Leave a comment</b></h4>
                <div class="leave-comment">

                    <form method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="name-input" type="text" placeholder="Name">
                            </div>
                            <div class="col-sm-6">
                                <input class="email-input" type="text" placeholder="Email">
                            </div>
                            <div class="col-sm-12">
                                <input class="subject-input" type="text" placeholder="Subject">
                            </div>
                            <div class="col-sm-12">
                                <textarea class="message-input" rows="6" placeholder="Message"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-2"><b>COMMENT</b></button>
                            </div>

                        </div><!-- row -->
                    </form>

                </div><!-- leave-comment -->

            </div><!-- comments-area -->

        </div><!-- blog-posts -->
    </div><!-- col-lg-4 -->

@endsection
@include('layouts.webAside')
@include('layouts.webFooter')
