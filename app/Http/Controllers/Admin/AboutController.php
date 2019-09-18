<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        return view('admin.about.index',compact('about'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phoneNumber'=>'required',
            'instaUrl'=>'required',
            'tellId'=>'required',
            'detail'=>'required',
        ]);
        if ($request->image == ""){
            $imgUrl = $about->image;
        }else{
            $imgUrl = $this->imageuploader($request->image);
        }
        $about->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$imgUrl,
            'phoneNumber'=>$request->phoneNumber,
            'instaUrl'=>$request->instaUrl,
            'tellId'=>$request->tellId,
            'detail'=>$request->detail,
            ]);
        return redirect(route('about.index'))->with('msg','اطلاعات شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
