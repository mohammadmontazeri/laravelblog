@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
                    <div class="card-header">ایجاد کامنت جدید</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('comment.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">پست را انتخاب کنید</label>
                                <select name="post_id" id="">
                                    <?php
                                    $posts = \App\Post::all();
                                    foreach ($posts as $post){
                                    ?>
                                    <option value="<?php echo $post->id;?>"><?php echo $post->title;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="text" required autocomplete="name" autofocus>
                                </textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="btn">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection