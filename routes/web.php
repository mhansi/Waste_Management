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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/buy', 'HomeController@buy')->name('buy');
Route::get('/collect', 'HomeController@collect')->name('collect');
Route::post('/createpost','PostController@postCreatePost');
Route::post('/createbuy', 'PostController@postCreateBuy');
Route::get('/delete/{id}','PostController@postDelete');

/* Route::post('/edit',function(\Illuminate\Http\Request $request){
   return response()->json(['message'=>$request['postId']]);
})->name('edit');  */

Route::post('/edit',[
    'uses'=>'PostController@postEdit',
    'as'=>'edit'
]);

Route::get('/account',[
    'uses'=>'PostController@getAccount',
    'as'=>'account'
]);
Route::post('/updateaccount',[
    'uses'=>'PostController@postSaveAccount',
    'as'=>'account.save'
]);
Route::get('/userimage/{filename}',[
    'uses'=>'PostController@getUserImage',
    'as'=>'account.image'
]);
Route::post('/like',[
  'uses'=>'PostController@postLikePost',
  'as'=>'like'
]);