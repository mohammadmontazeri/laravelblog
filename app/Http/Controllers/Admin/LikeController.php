<?php

namespace App\Http\Controllers\Admin;

use App\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajaxLike(Request $request)
    {
        if (Auth::check()){
            $like = Like::where('user_id','=',Auth()->user()->id)->where('post_id','=',$request->post_id)->first();
            if ($like){
                $like->delete();
                $likeNum = \App\Like::where('post_id','=',$request->post_id)->get();
                $num = count($likeNum);
                return response()->json([
                    'delete',$num
                ]);
            }else{
                Like::create([
                    'post_id' => $request->post_id,
                    'user_id' => Auth::user()->id
                ]);
                $likeNum = \App\Like::where('post_id','=',$request->post_id)->get();
                $num = count($likeNum);
                return response()->json([
                    'add',$num
                ]);
            }
        }else{
            return response()->json('noAuth');
        }


    }
}
