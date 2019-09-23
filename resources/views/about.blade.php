@include('layouts.webHeader')
@include('layouts.webSidebar')
@section('content')
        <?php
             $about = \App\About::where('id','=',1)->get()->first();
        ?>
        <div class="col-lg-8 col-md-12" style="direction: rtl">
            <div style="width: 500px">
                <img src="{{asset("public/$about->image")}}" alt="" width="500px" height="500px">
            </div>
            <hr>
            <div style="padding-bottom: 20px;">
                {!! $about->detail !!}
            </div>
            <div style="display: flex;flex-direction: column;">
                <label for="" style="padding: 10px;background-color: #31708f;color: #fff;border-radius: 2px;">راه های ارتباطی با من</label>
                <span style="padding: 5px;color: #f0004c;margin-bottom: 20px;border-radius: 2px;">{{$about->phoneNumber}}</span>
                <span style="padding: 5px;color: #f0004c;margin-bottom: 20px;border-radius: 2px;">{{$about->instaUrl}}</span>
                <span style="padding: 5px;color: #f0004c;margin-bottom: 20px;border-radius: 2px;">{{$about->tellId}}</span>
            </div>
        </div>
@endsection
@include('layouts.webAside')
@include('layouts.webFooter')
