
<div class="main-slider">
    <div id="slider">
        <?php
           $posts = \App\Post::all()->random(2);
        ?>
        @foreach($posts as $post)
        <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
            <img src="{{asset("public/$post->image")}}" class="ls-bg" alt="" />

            <div class="slider-content ls-l" style="top:60%; left:30%;" data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
                <a class="btn" href="#">
                    <?php
                    $cat = \App\Category::where('id','=',$post->cat_id)->first();
                    echo $cat->name;
                    ?>
                </a>
                <h5 class="title"><b>{{$post->title}}</b></h5>
                <h6><?php
                    $v = new Verta($post->created_at);
                    $v = \Hekmatinasser\Verta\Verta::instance($post->created_at);
                    $v = \Hekmatinasser\Verta\Verta::persianNumbers($v);
                    echo $v;
                    ?></h6>
            </div>

        </div><!-- ls-slide -->
        @endforeach
    </div><!-- slider -->
</div><!-- main-slider -->