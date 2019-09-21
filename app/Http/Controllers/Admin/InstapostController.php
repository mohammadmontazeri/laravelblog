<?php

namespace App\Http\Controllers\Admin;

use App\Instapost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstapostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instaposts = Instapost::latest()->paginate(2);
        return view('admin.instapost.index',compact('instaposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instapost.create');
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
            'url'=>'required|unique:instaposts'
        ]);

        Instapost::create([
            'url'=> $request->url,
            'post_id'=> $request->post_id
        ]);

        return back()->with('msg','اطلاعات با موفقیت ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instapost  $instapost
     * @return \Illuminate\Http\Response
     */
    public function show(Instapost $instapost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instapost  $instapost
     * @return \Illuminate\Http\Response
     */
    public function edit(Instapost $instapost)
    {
        return view('admin.instapost.edit',compact('instapost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instapost  $instapost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instapost $instapost)
    {
        $request->validate([
            'url'=>'required|unique:instaposts'
        ]);

        $instapost->update([
            'url'=> $request->url,
            'post_id'=> $request->post_id
        ]);
        return redirect(route('instapost.index'))->with('msg','اطلاعات با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instapost  $instapost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instapost $instapost)
    {
        $instapost->delete();

        return back()->with('msg','اطلاعات با موفقیت حذف شد');

    }
}
