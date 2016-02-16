<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::pattern('id','[1-9][0-9]*');
Route::pattern('slug','^[a-z0-9-]+$');

Route::get('/','FrontController@index');

Route::get('category/{id}/{slug}', 'FrontController@category');

Route::get('prod/{id}/{slug}', 'FrontController@show');

Route::get('post', function () {
    return "Voici les posts";
});

Route::get('/user/{id}', function ($id) {

    $users = ['Antoine', 'Thomas', 'Eric'];

   /* if(!empty($users[$id]))
        return $users[$id];
    else
        return 'no user';*/
    return view('user', compact('users', 'id'));
});

Route::get('/user/{id}', function ($id) {

    $users = ['Antoine', 'Thomas', 'Eric'];

    /* if(!empty($users[$id]))
         return $users[$id];
     else
         return 'no user';*/
    return view('user', compact('users', 'id'));
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('contact', 'FrontController@contact');
    Route::post('send', 'FrontController@sendContact');

    Route::any('login', 'LoginController@login');

    // pour protéger
    Route::group(['middleware' => ['auth']], function(){
        Route::resource('product', 'ProductController');
        Route::get('dashboard',function(){ return 'dashboard'; });
    });


});
