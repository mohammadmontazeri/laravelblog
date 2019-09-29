<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
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
       /* $mrg_1 = [];
        $mrg_2 = [];
        $mrg_3 = [];
        $mrg_4 = [];*/
        //return $request;
        if ($request->search==null&&empty($request->page)){
            $msg = "برای جستجو موردی را وارد کنید";
            return view('post.search',compact('msg'));
        }
        if (!empty($request->search)){
            Session::forget('data');
            Session::put('data',$request->search);
        }
            $data = session('data');

          //Session::flush();
                      /*$cats = Category::where('name', 'like', "%$data%")->get();
                      //return $cats;
                      foreach ($cats as $key => $cat) {
                          $array[$key] = $cat->id;
                      }
                      if (!empty($array)) {
                          $category = Post::whereIn('cat_id', $array)->latest()->get();
                      }else{
                          $category =[];
                      }
                       //   if (count($category) != 0) {
                              $posts[0] = $category;
                              foreach ($posts[0] as $key=>$post){
                                  $mrg_1[$key] = $post;
                              }
                              //return view('post.search', compact('posts'));
                          //}
                      $title = \App\Post::where('title', 'like', "%$data%")->latest()->get();
                      //if (count($title) != 0) {
                          $posts[1] = $title;
                          foreach ($posts[1] as $key=>$post){
                              $mrg_2[$key] = $post;
                          }
                          //return view('post.search', compact('posts'));
                     // }
                      $post = Post::where('detail', 'like', "%$data%")->latest()->get();
                      //return $post;
                      //if (count($post) != 0) {
                          $posts[2] = $post;
                          foreach ($posts[2] as $key=>$post){
                              $mrg_3[$key] = $post;
                          }
                         // return view('post.search', compact('posts'));
                    //  }
                      $tag = \App\Post::where('tags', 'like', "%$data%")->latest()->get();
                    //  if (count($tag) !=0){
                          $posts[3] = $tag;
                          foreach ($posts[3] as $key=>$post){
                              $mrg_4[$key] = $post;
                          }*/
                     // }

                           // $res = array_merge($mrg_1,$mrg_2,$mrg_3,$mrg_4);
                         // $res2 = array_unique($res);
                          //$posts = new Paginator($res2,2);
                         // $posts->withPath('http://localhost:8888/blog/search');
                        //return $res2;
                       // $con = Paginator::make($res2);
                                $posts=DB::table("posts")
                                    ->join("categories",'categories.id','=','posts.cat_id')
                                    ->select('posts.*')
                                    //->select('comments.*')
                                    ->where("posts.detail","like","%$data%")
                                    ->orWhere("posts.title","like","%$data%")
                                    ->orWhere("posts.tags","like","%$data%")
                                    ->orWhere("categories.name",'like',"%$data%")
                                    ->paginate(1);

                                if (count($posts) == 0){
                                    $msg = "موردی یافت نشد";
                                    return view('post.search', compact('msg'));
                                }else{
                                    return view('post.search', compact('posts'));
                                }

        // return redirect(route('searchPage'))->with('msg',"مورد مورد نظر یافت نشد");

    }
}
