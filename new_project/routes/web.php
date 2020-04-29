<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});






Route::resource('cms/categories','categoryController')->middleware('auth:admin,author');
Route::resource('cms/users','userController')->middleware('auth:admin');
Route::resource('cms/author','AuthorController')->middleware('auth:admin');
Route::resource('cms/artical','articalController')->middleware('auth:author');
Route::resource('cms/admin','adminController')->middleware('auth:admin');
Route::resource('cms/contact','contactController')->middleware('auth:admin');
Route::resource('register','registerCController');
Route::get('newsweb/comment','commentController@store')->name('comment.store')->middleware('auth:user');

Route::get('author/artical/show/{id}','AuthorController@ArticalShow')->middleware('auth:admin')->name('author.artical.index');

//----------------------------------------------------------------/*



Route::prefix('author')->group(function(){
    Route::get('login', 'Auth\AuthorAuthController@showLoginView')->name('cms.author.login_view');
    Route::post('login','Auth\AuthorAuthController@login')->name('author.login');
});

Route::prefix('author')->middleware('auth:author')->group(function(){
   Route::view('dashboard','cms.author.auth.dashboard')->name('author.dashboard');
   Route::get('logout', 'Auth\AuthorAuthController@logout')->name('author.logout');
});


//*********************************   ADMIN   ************************************************** */
Route::prefix('admin')->group(function(){
    Route::get('login','Auth\AdminAuthController@showLogin')->name('admin.loginView');
    Route::post('login','Auth\AdminAuthController@login')->name('admin.login');

});

Route::prefix('admin/')->middleware('auth:admin')->group(function(){
Route::view('dashboard','cms.dashboard')->name('admin.dashboard');
Route::get('logout','Auth\AdminAuthController@logout')->name('admin.logout');
});

Route::prefix('user')->middleware('verified')->group(function(){
    Route::get('login','Auth\userAuthcontroller@ShowLogin')->name('user.loginView');
    Route::post('login','Auth\userAuthcontroller@login')->name('user.login');
});

//*********************************   website   ************************************************** */

Route::get('','NewSwebcontroller@index')->name('newsweb.index');
Route::get('contact','NewSwebcontroller@create')->name('newsweb.create');

Route::get('/newsdetials/{id}','NewsWebController@newsdetials')->name('newsdetials.index');
Route::get('/allnews/{id}','NewSwebcontroller@allnews')->name("newsweb.allnews");

Route::prefix('user')->middleware('auth:user')->group(function(){

Route::get('logout','Auth\userAuthcontroller@logout')->name('user.logout');
});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

