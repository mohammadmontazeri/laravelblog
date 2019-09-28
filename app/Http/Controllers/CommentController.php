<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user,Post $post)
    {
        if ($request->text == ""){
            return redirect(route('postDetail',['post'=>$post->id]))->with('msg','لطفا متن مورد نظرتان را پر کنید');
        }else{
            if ($user->role == "admin"){
                $status = '1' ;
            }else{
                $status = '0' ;
            }
            Comment::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'text' => $request->text,
                'status' => $status
            ]);
            if ($user->role != "admin"){
                return redirect(route('postDetail',['post'=>$post->id]))->with('msg','پیفام شما بعد از بررسی نهایی در سایت ثبت خواهد شد');

            }else{
                return redirect(route('postDetail',['post'=>$post->id]));
            }
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
