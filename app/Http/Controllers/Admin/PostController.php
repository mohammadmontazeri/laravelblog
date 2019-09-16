<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
            'title' => 'required|unique:posts',
            'cat_id' => 'required',
            'summery' => 'required',
            'detail' => 'required',
            'tags' => 'required',
            'image' => 'required',
        ]);
        $imgUrl = $this->imageuploader($request->image);
        Post::create([
            'title' => $request->title,
            'cat_id' => $request->cat_id,
            'summery' => $request->summery,
            'detail' => $request->detail,
            'tags' => $request->tags,
            'image'=> $imgUrl
        ]);
        return back()->with('msg','پست مورد نظر با موفقیت افزوده شد ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->title == $post->title){
            $request->validate([
                'title' => 'required',
                'summery' => 'required',
                'detail' => 'required',
                'tags' => 'required',
            ]);
            $title = $post->title;
        }else{
            $request->validate([
                'title' => 'required|unique:posts',
                'summery' => 'required',
                'detail' => 'required',
                'tags' => 'required',
            ]);
            $title = $request->title;
        }
        if ($request->image != ""){
            $imgUrl = $this->imageuploader($request->image);
        }else{
            $imgUrl = $post->image;
        }

        $post->update([
            'title' => $title,
            'cat_id' => $request->cat_id,
            'summery' => $request->summery,
            'detail' => $request->detail,
            'tags' => $request->tags,
            'image'=> $imgUrl
        ]);

        return redirect(route('post.index'))->with('msg','پست مورد نظرتان با موفقیت ویرایش شده است ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'))->with('msg','پست مورد نظرتان با موفقیت حذف شده است ');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();

            $filenametostore = $filename.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('/uploads/'),$filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset("public/uploads/".$filenametostore);
            $msg = 'تصویر مورد نظر شما با موفقیت آپلود شد';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

//            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
