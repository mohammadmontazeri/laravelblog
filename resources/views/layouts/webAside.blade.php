<?php
$about = \App\About::all()->first();
$cats = \App\Category::all()->random(4);
$posts = \App\Post::latest()->paginate(4);
$ads = \App\Advertisement::all()->last();
$insta = \App\Instapost::latest()->paginate(3);
?>

<section class="section blog-area" style="margin-top: 250px;">
    <div class="container">
        <div class="row">
            @yield('content')
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area">

                    <div class="sidebar-section about-author center-text">
                        <div class="author-image"><img src="{{asset("public/$about->image")}}" alt="Autohr Image"></div>

                        <h4 class="author-name"><b class="light-color">{{$about->name}}</b></h4>
                        <p style="font-family: main, sans-serif"><?php
                            $sum = substr($about['detail'],0,201);
                            echo $summery = $sum."...";
                            ?></p>

                        <a class="read-more-link" href="{{url(route('about_me'))}}" style="font-family: main, sans-serif"><b>درباره من بیشتر بدانید</b></a>

                    </div><!-- sidebar-section about-author -->

                    <div class="sidebar-section src-area">
                        @if(session('search_msg'))
                            <label for="" style="color: #f0004c">{{session('search_msg')}}</label>
                        @endif
                        <div class="src-area" style="width: 100%">
                            <form action="{{route('search')}}" method="post">
                                @csrf
                                <input name="search"  type="text" placeholder="پست مورد نظرتان را از اینجا بیابید ..."
                                       style="font-family: main, sans-serif;direction: rtl">
                                <button class="src-btn" type="submit"><i style="color: #f0004c;font-size: 1.5em;font-weight: bold" class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><!-- src-area -->

                    </div><!-- sidebar-section src-area -->
                    @if(session('newsMsg'))
                        <label for="" style="background-color: #f0004c;color: #fff;padding: 5px;box-sizing: border-box;border-radius: 2.5px;">{{session('newsMsg')}}</label>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style-type: none">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="sidebar-section newsletter-area">
                        <h5 class="title"><b>با ارسال ایمیل عضو خبرنامه سایت شوید</b></h5>
                        <form  action="{{route('newsletterStore')}}" method="post">
                            @csrf
                            <input class="email-input" type="text" name="email" placeholder="ایمیل خود را وارد کنید" >
                            <button class="btn btn-2" type="submit">ارسال</button>
                        </form>
                    </div><!-- sidebar-section newsletter-area -->

                    <div class="sidebar-section category-area">
                        <h4 class="title"><b class="light-color">دسته بندی ها</b></h4>
                        @foreach($cats as $cat)

                            <a class="category" href="{{url(route('showPosts',['id'=>$cat->id]))}}">
                                <img src="{{asset("public/$cat->image")}}" alt="Category Image">
                                <h6 class="name">{{$cat->name}}</h6>
                            </a>
                            @endforeach
                    </div><!-- sidebar-section category-area -->

                    <div class="sidebar-section latest-post-area">
                        <h4 class="title"><b class="light-color">آخرین پست ها</b></h4>

                        @foreach($posts as $post)
                            <?php
                            //$cat = \App\Category::where('id','=',$post->cat_id)->first();
                                $cat = $post->category;
                            ?>
                            <div class="latest-post" href="#">
                                <div class="l-post-image"><img src="{{asset("public/$cat->image")}}" alt="Category Image"></div>
                                <div class="post-info">
                                    <a class="btn category-btn" href="{{url(route('showPosts',['id'=>$cat->id]))}}"><?php
                                     echo $cat->name;
                                        ?></a>
                                    <h5><a href="{{url(route('postDetail',['id'=>$post->id]))}}"><b class="light-color">{{$post->title}}</b></a></h5>
                                    <h6 class="date"><em><?php
                                            $v = new Verta($post->created_at);
                                            $v = \Hekmatinasser\Verta\Verta::instance($post->created_at);
                                            $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                                            echo $v;
                                            ?>
                                            </em></h6>
                                </div>
                            </div>
                            @endforeach

                    </div><!-- sidebar-section latest-post-area -->

                    <div class="sidebar-section advertisement-area">
                        <h4 class="title"><b class="light-color">تبلیغات</b></h4>
                        <a class="advertisement-img" href="{{url($ads->url)}}">
                            <img src="{{asset("public/$ads->image")}}" alt="Advertisement Image">
                            <h6 class="btn btn-2 discover-btn">مشاهده</h6>
                        </a>
                    </div><!-- sidebar-section advertisement-area -->
                    <div class="sidebar-section instagram-area">
                        <h5 class="title"><b class="light-color">آخرین پست های قرار داده شده در اینستاگرام</b></h5>
                        <ul class="instagram-img">
                            <?php
                            foreach($insta as $value){
                                $imgUrl = $value->post->image;
                                ?>
                                <li><a href="{{$value->url}}"><img src="{{asset("public/$imgUrl")}}" alt="Instagram Image"></a></li>
                               <?php
                               }
                               ?>
                            <div class="clearfix"></div>
                        </ul>
                    </div><!-- sidebar-section instagram-area -->

                    <div class="sidebar-section tags-area">
                        <h4 class="title"><b class="light-color">تگ ها</b></h4>
                        <ul class="tags">
                            <?php
                            $tags = \App\Tag::all();
                            foreach ($tags as $tag){
                                ?>
                                <li><a class="btn" href="{{url(route('showPostTag',['id'=>$tag->id]))}}">{{$tag->name}}</a></li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div><!-- sidebar-section tags-area -->

                </div><!-- about-author -->
            </div><!-- col-lg-4 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- section -->
