<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware(['cors'])->group(function () {
    Route::post('/login', 'UserController@checkLogin');

    Route::group(['prefix' => 'user'], function(){
    //USER
    Route::get('getUser/{id_user}','UserController@getUser');
    Route::post('reporting', 'LaporController@lapor');
    Route::get('getReport/{id_user}','LaporController@getReportIdUser');
    Route::get('getReportOne/{id}','LaporController@getReportId');

    
    });
    
    Route::group(['prefix' => 'admin'], function(){
   
//ADMIN
    Route::get('/getReportAll','LaporController@getReportAll');
    Route::get('/getReportReq','LaporController@getReportReq');
    Route::get('/getReportProgress','LaporController@getReportProgress');
    Route::get('/getReportFinish','LaporController@getReportFinish');
    Route::post('/putProfile/{id}', 'LaporController@editProfile');
    // Route::post('/putProgres','');
    // Route::post('/putFinish','');
    Route::get('getgrafik','AdminController@getGrafik');
    Route::get('getchart','AdminController@getChart');

    Route::post('register', 'UserController@register');
    });
    

// });