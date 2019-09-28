<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hekmatinasser\Verta\Verta;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(2);
        return view('admin.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.create');
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
            'text' => 'required'
        ]);
                Comment::create([
                    'text'=>$request->text,
                    'user_id'=>Auth()->user()->id,
                    'post_id'=>$request->post_id,
                    'status' => '1'
                ]);
                return back()->with('msg','کامنت مورد نظر با موفقیت افزوده شد ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'text' => $request->text,
            'status' => $request->status
        ]);
        return redirect(route('comment.index'))->with('msg','کامنت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->is_parent == '1'){
            return back()->with('msg','کامنتی را که میخواهید حذف کنید دارای پاسخ می باشد');
        }else{
            $parent = $comment->parent;
            $comment->delete();
            if ($parent != ""){
                $com = Comment::where('parent','=',$parent)->get();
                if (empty($com[0])) {
                    $par = Comment::where('id', '=', $parent)->get()->first();
                    $par->update([
                        'is_parent' => '0'
                    ]);
                }
            }
            return back()->with('msg','کامنت مورد نظر شما با موفقیت حذف شد');
        }
    }


    public function reply(Comment $comment)
    {
        $post = $comment->post;
        return view('admin.comment.reply',compact('comment'));
    }


    public function replyPost(Request $request , Comment $comment)
    {
        $request->validate([
            'text'=>'required'
        ]);

        Comment::create([
            'text'=>$request->text,
            'user_id'=> Auth()->user()->id,
            'post_id'=>$comment->post->id,
            'parent'=> $comment->id,
        ]);
        $comment->update([
            'is_parent' => '1'
        ]);
        return back()->with('msg','کامنت مورد نظر با موفقیت افزوده شد ');
    }
}
