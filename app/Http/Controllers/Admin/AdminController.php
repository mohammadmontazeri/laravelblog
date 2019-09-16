<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function imageuploader($file){
        $filename=time()."_".$file->getClientOriginalName();
        $path=public_path('/uploads/');
        $file->move($path,$filename);
        return "/uploads/".$filename;
    }
}
