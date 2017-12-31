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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*Route::get('topage', 'TopController@index1');*/
//Route::post('/topage', 'TestController@store');
//Route::get('/{topage}', 'TopController@search');

Route::get('/CreateTop', 'TopController@index');
Route::get('/CreateMainPage', 'MainPageController@index1');
Route::get('/CreatePage', 'PageController@index1');


//store :
Route::post('/CreatePage', ['uses'=> 'PageController@store','as'=>'page.store' ]);
Route::post('/CreateTop', ['uses'=> 'TopController@store','as'=>'top.store' ]);
Route::post('/CreateMainPage', ['uses'=> 'MainPageController@store','as'=>'mainpage.store' ]);
Route::post('/{top_id}/comment' , ['uses'=> 'CommentController@store','as'=>'comment.store' ]);
Route::post('/{top_id}/{parent_id}/comment' , ['uses'=> 'CommentController@storereplay','as'=>'comment.storereplay' ]);
Route::post('/incrementvote' , 'CommentController@incrementvote');
Route::post('/decrementvote' , 'CommentController@decrementvote');
Route::post('/deletecomment' , 'CommentController@deletecomment');

//Route::get('/comment1' , 'CommentController@showincrement' );

//edit/delete comments 
//Route::get('/comment/{id}/edit' , ['uses'=> 'CommentController@edit','as'=>'comment.edit' ]);
//Route::put('/comment/{id}', ['uses'=> 'CommentController@update','as'=>'comment.update' ]);
//Route::delete('/comment/{id}', ['uses'=> 'CommentController@destroy','as'=>'comment.destroy' ]);


//dinamic :
Route::get('/{main}/{slug}', 'PageController@index');
Route::get('/{main}', 'MainPageController@index');
