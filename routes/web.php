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
Route::prefix('admin')->group(function (){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('adminLogin');
    Route::post('login', 'Auth\LoginController@login')->name('adminPostLogin');
    Route::get('logout', function (){
        \Illuminate\Support\Facades\Auth::logout();
        if (isset($_GET['q'])){
            if ($_GET['q'] == 'user'){
                return redirect(route('index'))->with('msg','شما با موفقیت خارج شدید');
            }
        }else{
            return redirect('/admin/login')->with('msg','شما با موفقیت خارج شدید');
        }
    })->name('adminLogout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('adminRegister');
    Route::post('register', 'Auth\RegisterController@register')->name('adminPostRegister');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('adminVerification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('adminVerification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('adminVerification.resend');
});

Route::prefix('admin')->middleware('auth:web')->group(function (){
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::resource('/user','Admin\UserController');
    Route::post('/userSearch',function (\Illuminate\Http\Request $request){
        //$user = \Illuminate\Support\Facades\Auth::user();
        if ($request->user_search == ""){
            $msg = "عبارتی را برای جستجو وارد نمایید";
            return redirect(route('user.index'))->with('msg',$msg);
        }else{
            $users = \App\User::where('name','like',"%$request->user_search%")->get();
            return view('admin.user.search',compact('users'));
        }
    })->name('userSearch');
    Route::resource('/category','Admin\CategoryController');
    Route::resource('/post','Admin\PostController');
    Route::post('ckeditor/image_upload', 'Admin\PostController@upload')->name('upload');
    Route::get('post/detail/{detail}',function (\App\Post $detail){
        return view('admin.post.detail',compact('detail'));
    })->name('postDetail');
    Route::resource('/comment','Admin\CommentController');
    Route::get('reply/{comment}','Admin\CommentController@reply')->name('replyComment');
    Route::post('reply/{comment}','Admin\CommentController@replyPost')->name('replyCommentPost');
    Route::resource('/tag','Admin\TagController');
    Route::resource('/about','Admin\AboutController');
    Route::get('about/detail/{detail}',function (\App\About $detail){
        return view('admin.about.detail',compact('detail'));
    })->name('aboutDetail');
    Route::resource('/advertisement','Admin\AdvertisementController');
    Route::resource('/instapost','Admin\InstapostController');
    Route::resource('/newsletter','Admin\NewsletterController');
});
Route::get('/',function (){
    return view('index');
})->name('index');
Route::get('/register', function (){
    return view('register');
})->name('register');
Route::get('/login', function (){
    return view('login');
})->name('login');
Route::post('/login','Auth\LoginController@authenticate')->name('userLogin');
Route::get('/posts/{id}',function (\App\Category $id){
    return view('category.posts',compact('id'));
})->name('showPosts');
Route::post('/search','Admin\PostController@search')->name('search');
Route::post('/ajax','Admin\LikeController@ajaxLike')->name('ajaxLike');

Route::get('/detail/{post}','PostController@index')->name('postDetail');
Route::post('comment/store/{user}/{post}','CommentController@store')->name('commentStore');
Route::get('/tag/{tag}',function (\App\Tag $tag){
    $posts = \App\Post::where('tags','like',"%$tag->name%")->latest()->paginate(1);
    return view('tag.showPost',compact('posts'),compact('tag'));
})->name('showPostTag');
/*
Route::get('/mail',function (){
   \Illuminate\Support\Facades\Mail::to(\Illuminate\Support\Facades\Auth::user()->email)->send(new \App\Mail\authMail());
});*/
/*
Route::get('/a',function (){
    return view('post.detail');
});*/

