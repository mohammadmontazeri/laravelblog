@include('layouts.webHeader')
@include('layouts.webSidebar')
@section('content')
    <div class="col-lg-8 col-md-12">
        <h3 style="margin-bottom: 20px;padding: 10px;"  >
                نتیجه جستجو شما
        </h3>
        <div class="blog-posts">
            <?php
            foreach ($posts as $post){
            ?>
            <div class="single-post">
                <div class="image-wrapper"><img src="{{asset("public/$post->image")}}" alt="Blog Image"></div>
                <div class="icons">
                    <div class="left-area">
                    </div>
                    <ul class="right-area social-icons">
                        <li><a href="#"><i class="ion-android-favorite-outline"></i>{{$post->likes}}</a></li>
                        <li><a href="#"><i class="ion-android-textsms"></i>{{$post->viewed}}</a></li>
                    </ul>
                </div>
                <p class="date" style="font-family: main, sans-serif"><em><?php
                        $v = new Verta($post->created_at);
                        $v = \Hekmatinasser\Verta\Verta::instance($post->created_at);
                        $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                        echo $v;
                        ?></em></p>
                <h3 class="title"><a href="#"><b class="light-color">{{$post->title}}</b></a></h3>
                <p style="font-family: main, sans-serif">{{$post->summery}}</p>
                <a class="btn read-more-btn" href="#" style="font-family: main, sans-serif"><b>بیشتر بخوانید</b></a>
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
