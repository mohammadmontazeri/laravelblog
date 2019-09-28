<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

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
       // return $request;
            $request->validate([
            'title' => 'required|unique:posts',
            'cat_id' => 'required',
            'summery' => 'required',
            'detail' => 'required',
            'tags' => 'required',
            'image' => 'required',
        ]);
          //  return $request;die;
        $imgUrl = $this->imageuploader($request->image);
        Post::create([
            'title' => $request->title,
            'cat_id' => $request->cat_id,
            'summery' => $request->summery,
            'detail' => $request->detail,
            'tags' => implode($request->tags,','),
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
            'tags' => implode($request->tags,','),
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
    /// User Side Functions
    public function search(Request $request)
    {
        Session::put('data',$request->search);
        //Session::flush();
        if ($request->search == ""){
            $msg = "عبارتی را برای جستجو وارد نمایید";
            return redirect(route('searchPage'))->with('search_msg',$msg);
        }else{
            $cats = Category::where('name','like',"%$request->search%")->get();
            //return $cats;
            foreach ($cats as $key=>$cat){
                $array[$key] = $cat->id;
            }
            if (!empty($array)){
                $category = Post::whereIn('cat_id',$array)->paginate(1);
                if (count($category) !=0){
                    return redirect(route('searchPage'))->with('category',$array);
                }
            }
            $title = \App\Post::where('title','like',"%$request->search%")->latest()->paginate(1);
            if (count($title) !=0){
                return redirect(route('searchPage'))->with('title',$title);
            }
            $post = Post::where('detail','like',"%$request->search%")->latest()->paginate(3);
            //return $post;
            if (count($post) !=0){
                return redirect(route('searchPage'))->with('post',$post);
            }
            $data = session('data');
            $tag = \App\Post::where('tags','like',"%$data%")->latest()->paginate(1);
            if (count($tag) !=0){
                return view('post.search',compact('tag'));
            }
                return redirect(route('searchPage'))->with('msg',"مورد مورد نظر یافت نشد");
        }
    }
}
