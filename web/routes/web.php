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
 * 
 * 
 * 
 * 
 * php artisan make:model Top -cr
 * 
 * 
 *   Form :     {{Form::open(['route'=>'page.store','method'=>'POST'])}}
        {{Form::label('name','Name:')}}
        {{Form::text('name','null')}}
        
           {{Form::label('title','Title:')}}
        {{Form::text('title','null')}}
        
                   {{Form::label('body','body:')}}
        {{Form::text('body','null')}}
        
        {{Form::submit('Add page')}}


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
*/


Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('/CreateTop', 'TopController@index');
Route::get('/CreateMainPage', 'MainPageController@index1');
Route::get('/CreatePage', 'PageController@index1');


//store :
Route::post('/CreatePage', ['uses'=> 'PageController@store','as'=>'page.store' ]);
Route::post('/CreateTop', ['uses'=> 'TopController@store','as'=>'top.store' ]);
Route::post('/CreateMainPage', ['uses'=> 'MainPageController@store','as'=>'mainpage.store' ]);
Route::post('/comment/{top_id}' , ['uses'=> 'CommentController@store','as'=>'comment.store' ]);

//edit/delete comments 
//Route::get('/comment/{id}/edit' , ['uses'=> 'CommentController@edit','as'=>'comment.edit' ]);
//Route::put('/comment/{id}', ['uses'=> 'CommentController@update','as'=>'comment.update' ]);
//Route::delete('/comment/{id}', ['uses'=> 'CommentController@destroy','as'=>'comment.destroy' ]);


//dinamic :
Route::get('/{main}/{slug}', 'PageController@index');
Route::get('/{main}', 'MainPageController@index');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
