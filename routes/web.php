<?php

use Illuminate\Support\Facades\Route;

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
    return view('client\views\main');
})->name('main');
Route::group(['middleware'=>['auth.login']],function(){
    Route::get('/user/setting','App\Http\Controllers\AccountController@AccountSettingView')->name('account.setting');
    Route::post('/user/update','App\Http\Controllers\AccountController@AccountUpdate')->name('account.update');
    Route::get('/logout','App\Http\Controllers\LoginController@Logout')->name('logout');
    Route::post('/review/{id}','App\Http\Controllers\ReviewController@Review')->name("review.submit");
});
//login
Route::post('/login/validate','App\Http\Controllers\LoginController@Login')->name('login.validate');
Route::post('/register','App\Http\Controllers\LoginController@Register')->name('register');
//account
Route::get('/user/detail/{id}','App\Http\Controllers\AccountController@AccountDetailView')->name('account.detail');
//movies
Route::get('/movies','App\Http\Controllers\MovieController@MovieListView')->name("movies");
Route::get('/movie/detail/{id}','App\Http\Controllers\MovieController@MovieDetailView')->name("movie.detail");
Route::get('/movies/{category}','App\Http\Controllers\MovieController@MovieCategoryView')->name("movies.category");
//Theater
Route::get('theater/detail/{id}','App\Http\Controllers\TheaterController@TheaterDetailView')->name("theater.detail");
//Review
