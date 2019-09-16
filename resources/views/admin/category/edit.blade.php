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
                        <form method="POST" action="{{ route('category.update',['category' => $category->id]) }}" enctype="multipart/form-data">
                            {{method_field('PATCH')}}
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ویرایش دسته ') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{$category->name}}" autocomplete="name"
                                           autofocus>
                                </div>
                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control @error('name') is-invalid @enderror"
                                           name="image"  autocomplete="name">
                                </div>
                                <img src="{{asset("public/$category->image")}}" alt="" width="75px">
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