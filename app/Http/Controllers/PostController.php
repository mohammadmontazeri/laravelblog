<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('post.detail',compact('post'));
    }

}
