<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hekmatinasser\Verta\Verta;

class AdvertisementController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Advertisement::latest()->paginate(2);
        return view('admin.advertisement.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement.create');
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
            'url'=> 'required|unique:advertisements',
            'image'=> 'required'
        ]);
        $imgUrl = $this->imageuploader($request->image);
        Advertisement::create([
            'url'=>$request->url,
            'image'=>$imgUrl
        ]);

        return back()->with('msg','اطلاعات با موفقیت ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisement.edit',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'url' => 'required|unique:advertisements'
        ]);
        if ($request->image == ""){
            $imgUrl = $advertisement->image;
        }else{
            $imgUrl = $this->imageuploader($request->image);
        }

        $advertisement->update([
            'image'=> $imgUrl,
            'url' => $request->url
        ]);
        return redirect(route('advertisement.index'))->with('msg','اطلاعات با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return back()->with('msg','اطلاعات با موفقیت حذف شد');
    }
}
