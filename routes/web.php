<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/hellow', function () {    
    return 'Hello word';
});

//add dinamic route
Route::get('/users/{id}', function ($id) {    
    return 'this is userid '.$id;
});
//http://127.0.0.1:8000/users2/madre/bb
Route::get('/users2/{id}/{name}', function ($id,$name) {    
    return 'this is userid '.$id.' and name '.$name;
});

//add web route with controller
//V 2017:
//Route::get('/','PagesController@index');
//V2021
Route::get('/',[PagesController::class,'index']);

Route::get('/about',[PagesController::class,'about']);

Route::get('/services',[PagesController::class,'services']);

Route::resource('posts', PostController::class);


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);//->name('dashboard')
