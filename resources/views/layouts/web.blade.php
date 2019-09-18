<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>TITLE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!-- Stylesheets -->

    <link href="{{asset('public/common-css/bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('public/common-css/ionicons.css')}}" rel="stylesheet">

    <link href="{{asset('public/common-css/layerslider.css')}}" rel="stylesheet">

    <link href="{{asset('public/01-homepage/css/styles.css')}}" rel="stylesheet">

    <link href="{{asset('public/01-homepage/css/responsive.css')}}" rel="stylesheet">

    <link href="{{asset('public/css/font.css')}}" rel="stylesheet">
    <style>
        body{
            font-family: "main", sans-serif;
        }
    </style>

</head>
<body>

<header>

    <div class="top-menu">

        <ul class="left-area welcome-area" style="direction: rtl">
            <li class="hello-blog">سلام به وبلاگ شخصی محمد منتظری خوش آمدید</li>
            <li><a href="mailto:contact@juliblog.com">contact@juliblog.com</a></li>
            <li style="border:solid 1.2px #f0004c;border-radius: 2px;"><a href="#"> ثبت نام </a> | <a href="#">ورود</a></li>
        </ul><!-- left-area -->


        <div class="right-area" style="width: 50%">

            <div class="src-area" style="width: 100%">
                <form action="post">
                    <input  type="text" placeholder="پست مورد نظرتان را از اینجا بیابید ..."
                            style="font-family: main, sans-serif;direction: rtl">
                    <button class="src-btn" type="submit"><i style="color: #f0004c;font-size: 1.5em;font-weight: bold" class="ion-ios-search-strong"></i></button>
                </form>
            </div><!-- src-area -->
        </div><!-- right-area -->

    </div><!-- top-menu -->

    <div class="middle-menu center-text">
        <a href="#" class="logo" >
            <h1 style="font-weight: bolder;">گپ <span style="color: #31708f">چی</span> </h1>
        </a>
    </div>

    <div class="bottom-area">

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu" style="direction: rtl">
            <li><a href="#">صفحه اصلی</a></li>
            <li class="drop-down"><a href="#!"> دسته بندی ها  <i class="ion-ios-arrow-down"></i></a>
                <ul class="drop-down-menu">
                    <li><a href="#">دسته اول</a></li>
                    <li><a href="#">دسته دوم</a></li>
                    <li><a href="#">دسته سوم</a></li>
                </ul>

            </li>
            <li><a href="#">تماس با من</a></li>
        </ul><!-- main-menu -->

    </div><!-- conatiner -->
</header>


<div class="main-slider">
    <div id="slider">

        <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
            <img src="images/slider-1-1600x800.jpg" class="ls-bg" alt="" />

            <div class="slider-content ls-l" style="top:60%; left:30%;" data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
                <a class="btn" href="#">TRAVEL</a>
                <h3 class="title"><b>Travel, Love, Live</b></h3>
                <h6>29 October, 2017</h6>
            </div>

        </div><!-- ls-slide -->

        <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
            <img src="images/slider-2-1600x800.jpg" class="ls-bg" alt="" />

            <div class="slider-content ls-l" style="top:60%; left:30%;" data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
                <a class="btn" href="#">TRAVEL</a>
                <h3 class="title"><b>Travel, Love, Live</b></h3>
                <h6>29 October, 2017</h6>
            </div>

        </div><!-- ls-slide -->

    </div><!-- slider -->
</div><!-- main-slider -->


<section class="section blog-area">
    <div class="container">
        <div class="row">