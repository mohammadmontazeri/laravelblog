@extends('layouts.admin')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">افزودن پست جدید</h3>
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
        </div><!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            {{method_field('POST')}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان پست</label>
                    <input type="text" class="form-control" name="title"   placeholder="عنوان پست خود را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">دسته بندی را انتخاب کنید</label>

                        <?php
                        $cats = \App\Category::all();
                        if (empty($cats[0])){
                            echo "<label style='color: #f00000;border-bottom: solid 2px #ddd;'>دسته ای برای نمایش وجود ندارد</label>";
                            echo "<a class='label label-warning' href='".url(route('category.create'))."' style='float: left;padding: 7px;'>افزودن دسته جدید</a>";
                        }else{
                            echo "<select name='cat_id' id='none'>";
                            foreach ($cats as $cat){
                            ?>
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            <?php
                            }
                            echo "</select>";
                        }

                        ?>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">خلاصه متن</label>
                    <input type="text" class="form-control" name="summery" placeholder="خلاصه متن را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">متن محتوا</label>
                    <textarea class="form-control" id="editor1"  name="detail">
                </textarea>
                </div>
                <hr>
                <div class="form-group">
                    <label for="exampleInputEmail1">تگ ها</label>
                    <?php
                        $tags = \App\Tag::all();
                        foreach ($tags as $tag){
                         ?>
                    <div class="form-check">
                        <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->name}}" id="defaultCheck1" >
                        <label class="form-check-label" for="defaultCheck1">
                            {{$tag->name}}
                        </label>
                    </div>

                    <?php
                        }
                    ?>
                </div>
                <hr>
                <div class="form-group">
                    <label for="exampleInputFile">تصویر شاخص</label>
                    <input type="file" id="exampleInputFile" name="image">
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btn">افزودن</button>
            </div>
        </form>
    </div><!-- /.box -->



@endsection