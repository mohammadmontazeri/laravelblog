<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->middleware('auth:web')->group(function (){
    Route::get('/', function () {
        return view('admin.home');
    });
});
Route::prefix('admin')->group(function (){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('adminLogin');
    Route::post('login', 'Auth\LoginController@login')->name('adminPostLogin');
    Route::get('logout', function (){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/admin/login')->with('msg','شما با موفقیت خارج شدید');
    })->name('adminLogout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('adminRegister');
    Route::post('register', 'Auth\RegisterController@register')->name('adminPostRegister');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('adminVerification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('adminVerification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('adminVerification.resend');
    Route::resource('/user','Admin\UserController');
});
Route::post('/admin/test',function (\Illuminate\Http\Request $request){
    //$user = \Illuminate\Support\Facades\Auth::user();
    if ($request->user_search == ""){
        $msg = "عبارتی را برای جستجو وارد نمایید";
        return redirect(route('user.index'))->with('msg',$msg);
    }else{
        $users = \App\User::where('name','like',"%$request->user_search%")->get();
        return view('admin.user.search',compact('users'));
    }

})->name('userSearch');
//Route::get('/home', 'HomeController@index')->name('home');

