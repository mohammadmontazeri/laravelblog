@extends('layouts.admin')
@section('content')
<div style="width: 90%;border: solid 1px #ddd;padding:5px 10px;border-radius: 1.5px;background-color: #eee;margin: auto">
   <h4 style="color: #222">تگ ها</h4>
    <div style="width: 90%;padding: 10px 0px;display: flex;flex-wrap: wrap;margin: auto ">
        @for($i=0;$i<=60;$i++)
        <span style="padding: 5px;margin-top:2px;margin-left:2px;color: #f0004c;border:solid 1px #f0004c;border-radius: 2px">{{$i}}</span>
        @endfor
    </div>
</div>
@endsection

