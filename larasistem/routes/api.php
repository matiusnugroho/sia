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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['namespace'=>'API'], function() {
    Route::post('auth','APIAuthController@auth');
    Route::get('test','APITestController@auth');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::resource('info', 'InfoAnakController');
	    Route::get('nilai/{id}/lokal/{id_lokal}','NilaiAnakController@rapor')->name('rapor-anak');
	    Route::get('nilai/{id}/lokal/{id_lokal}/matapelajaran/{id_mapel?}','NilaiAnakController@rekap')->name('rekap-anak');
	    Route::post('nilai/getrapor/{id}','NilaiAnakController@getRapor')->name('getrapor');
	    Route::post('nilai/getrekap/{id}','NilaiAnakController@getRekap')->name('getrekap');
	    Route::resource('nilai', 'NilaiAnakController');
    });
});