<?php
use Hekmatinasser\Verta\Verta;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>سایت شخصی من</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!-- Stylesheets -->

    <link href="{{asset('public/css/detailpost.css')}}" rel="stylesheet">

    <link href="{{asset('public/css/styles.css')}}" rel="stylesheet">

    <link href="{{asset('public/common-css/bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('public/common-css/ionicons.css')}}" rel="stylesheet">

    <link href="{{asset('public/common-css/layerslider.css')}}" rel="stylesheet">

    <link href="{{asset('public/01-homepage/css/styles.css')}}" rel="stylesheet">

    <link href="{{asset('public/01-homepage/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/shop/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/shop/css/media.css')}}">
    <link href="{{asset('public/css/font.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/all.css')}}" rel="stylesheet">

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
            <li style="color: #31708f">
                <?php
                    $about = \App\About::all()->first();
                    echo $about->email;
                ?>
            </li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li style="border:solid 1.2px #f0004c;border-radius: 2px;">
                    <?php
                    if (Auth()->user()->role == "admin"){
                        ?>
                        <a href="{{url(route('panel'))}}"> پنل کاربری </a> |
                    <?php
                    }
                    ?>
                    <a href="{{url(route('adminLogout',['q'=>'user']))}}">خروج</a></li>
            @else
                <li style="border:solid 1.2px #f0004c;border-radius: 2px;"><a href="{{url(route('register'))}}"> ثبت نام </a> | <a href="{{url(route('login'))}}">ورود</a></li>
            @endif

        </ul><!-- left-area -->


        <div class="right-area" style="width: 50%">
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
            <li><a href="{{url(route('index'))}}">صفحه اصلی</a></li>
            <li class="drop-down"><a href="#!"> دسته بندی ها  <i class="ion-ios-arrow-down"></i></a>
                <ul class="drop-down-menu">
                   <?php
                    $cats = \App\Category::all();
                    foreach ($cats as $cat){
                        ?>

                       <li><a href="{{url(route('showPosts',['id'=>$cat->id]))}}">{{$cat->name}}</a></li>

                    <?php
                    }

                    ?>
                </ul>

            </li>
            <li><a href="{{url(route('contact'))}}">تماس با من</a></li>
        </ul><!-- main-menu -->

    </div><!-- conatiner -->
</header>

