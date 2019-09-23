@include('layouts.webHeader')
@section('content')

    <div class="leave-comment-area">
        <h4 class="title"><b class="light-color">تماس با ما</b></h4>
        <div class="leave-comment">
            @if(session('msg'))
                <label style="color: #f0004c">{{session('msg')}}</label>
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
            <form method="post" action="{{route('contactStore')}}">
                @csrf
                {{method_field('POST')}}
                <div class="row">
                    <div class="col-sm-6">
                        <input class="name-input" type="text" placeholder="Name" name="name">
                    </div>
                    <div class="col-sm-6">
                        <input class="email-input" type="text" placeholder="Email" name="email">
                    </div>
                    <div class="col-sm-12">
                        <textarea class="message-input" rows="6" placeholder="Message" name="message"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-2"><b>ارسال</b></button>
                    </div>

                </div><!-- row -->
            </form>

        </div><!-- leave-comment -->

    </div><!-- comments-area -->


@endsection
@include('layouts.webAside')
@include('layouts.webFooter')