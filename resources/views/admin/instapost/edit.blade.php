@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="list-style-type: none">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('instapost.update',['instapost' => $instapost->id]) }}" enctype="multipart/form-data">
                            {{method_field('PATCH')}}
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ویرایش  ') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="url" value="{{$instapost->url}}" autocomplete="name"
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <select name="post_id" id="">
                                    <?php
                                    $posts = \App\Post::all();
                                    foreach ($posts as $post){
                                    ?>
                                    <option value="{{$post->id}}"
                                    <?php
                                        if ($instapost->post_id==$post->id){
                                            echo "selected";
                                        }
                                        ?>
                                    >{{$post->title}}</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ویرایش') }}
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