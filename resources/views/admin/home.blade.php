@extends('layouts.admin')
@section('content')
    <?php
        $tags = \App\Tag::all();
        $posts = \App\Post::orderBy('viewed','desc')->latest()->paginate(4);
        $latestPost = \App\Post::latest()->paginate(2);
    ?>
<div style="width: 90%;border: solid 1px #ddd;padding:5px 10px;border-radius: 1.5px;background-color: #eee;margin: auto;margin-bottom: 20px;">
   <h4 style="color: #222">تگ ها</h4>
    <div style="width: 90%;padding: 10px 0px;display: flex;flex-wrap: wrap;margin: auto ">
        @foreach($tags as $tag)
        <span style="padding: 5px;margin-top:2px;margin-left:2px;color: #f0004c;border:solid 1px #f0004c;border-radius: 2px">{{$tag->name}}</span>
        @endforeach
    </div>
</div>
    <div style="width: 90%;border: solid 1px #ddd;padding:5px 10px;border-radius: 1.5px;background-color: #e1e4e9;margin: auto;margin-bottom: 20px;">
        <h4 style="color: #222">پربازدیدترین پست ها</h4>
        <div style="width: 90%;padding: 10px 0px;display: flex;flex-wrap: wrap;margin: auto ">
            @foreach($posts as $post)
                <span class="alert alert-info" style="padding: 5px;margin-top:2px;margin-left:2px;border-radius: 3px">{{$post->title}}</span>
            @endforeach
        </div>
    </div>
    <div style="width: 90%;border: solid 1px #ddd;padding:5px 10px;border-radius: 1.5px;background-color: #e6e6e6;margin: auto;margin-bottom: 20px;">
        <h4 style="color: #222">آخرین پست ها</h4>
        <div style="width: 90%;padding: 10px 0px;margin: auto ;">
            @foreach($latestPost as $post)
               <div style="display: flex;flex-direction: column;margin-bottom: 10px">
                   <img src="{{asset("public/$post->image")}}" alt="" width="150px" height="100px" style="border-radius: 2px;position: relative;">
                   <span  style="font-size: .9em;position: absolute; padding: 5px;margin-top:2px;margin-left:2px;border-radius: 2px;background-color: #595959;color: #fff;">{{$post->title}}</span>
               </div>
                @endforeach
        </div>
    </div>
@endsection

