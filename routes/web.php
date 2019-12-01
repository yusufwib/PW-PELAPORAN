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



Route::get('/', function(){
    return view('login');
});

Route::middleware(['auth', 'revalidate'])->group(function() {
    Route::get('/form', function(){
        return view('form');
    });
    Route::get('/dashboard', function(){
        return view('dashboard');
    });
    Route::get('/register', function () {
        return view('register');
    });
    Route::get('/adduser', function () {
        return view('adduser');
    });
    Route::get('/home', function () {
        return view('home');
    });
    
    Route::get('/datatable', function () {
        return view('datatable');
    });
    Route::get('/accordion','AdminController@getData')->name('accordion');
    Route::post('/accordion','AdminController@getDataByDate');

});
Route::post('/register', 'AdminController@register');

Route::post('/checkLogin', 'AuthController@checkLogin')->name('checkLogin');
Route::get('/login', 'AuthController@indexLogin')->name('login');
Route::get('/delete/{id}', 'AdminController@deleteUser');
Route::post('import', 'MaatwebsiteController@import')->name('import');


// Route::post('/register', 'AuthController@register')->name('register');
Route::get('/logout', 'AuthController@logout')->name('logout');



Route::post('/putProses/{id}','AdminController@putProses');
Route::post('/putFinish/{id}','AdminController@putFinish');
Route::post('/edit','AdminController@edit');

Route::get('/delReport/{id}','AdminController@delReport');
Route::post('/delReport/{id}','AdminController@putdelReport');

Route::get('/tableData','AdminController@table');
// Route::post('/putProfile/{id}','LaporController@editProfile');
