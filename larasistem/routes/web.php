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

Auth::routes();
Route::get('404', 'ErrorController@error404');
Route::get('logout','Auth\LoginController@logout');
Route::get('artisan/{command}', 'CacheController@show');
Route::resource('install','InstallController');

Route::group(['middleware'=>['install','auth']],function(){
	Route::get('/', 'HomeController@index');
	Route::get('/user/cari','UserController@cari');
	Route::resource('/user','UserController');
	
	Route::get('/guru/cari','GuruController@cariGuru');
	Route::resource('/guru','GuruController');

	Route::get('/siswa/cari','SiswaController@cariSiswa');
	Route::resource('/siswa','SiswaController');

	Route::get('rekapnilai/laporan','RekapNilaiController@handleReportNilai');
	Route::get('rekapnilai/rapor','RekapNilaiController@handleRapor');
	Route::get('rekapnilai/laporan/pdf','RekapNilaiController@laporanNilaiPDF');
	Route::get('rekapnilai/rapor/pdf','RekapNilaiController@raporPDF');
	Route::resource('/rekapnilai', 'RekapNilaiController');
	Route::get('rekapnilai/{id}/excel','RekapNilaiController@excel');
	Route::get('rekapnilai/{id}/pdf','RekapNilaiController@pdf');
	Route::any('rekapnilai/{id}/editnilai','RekapNilaiController@editNilai')->name('rekapnilai.editnilai');
	Route::get('elearning/post','ElearningController@getPosts')->name('elearning.posts');
	Route::resource('elearning', 'ElearningController');
	Route::post('elearning/{idmateri}/komen','ElearningController@postKomen')->name('elearning.postkomentar');
	Route::post('elearning/{idkomen}/reply','ElearningController@replyKomen')->name('elearning.postreply');

	Route::post('file/{type}','FileUploadController@upload')->name('fileupload');
	Route::get('notifikasi/{id}','NotificationsController@markAsRead');

	Route::get('lokal/{id}/tambahsiswa','LokalController@tambahsiswa');
	Route::post('lokal/{id}/tambahsiswa','LokalController@simpanSiswaLokal');
	Route::post('lokal/ta','LokalController@perTA')->name('lokal.perta');
	Route::resource('lokal', 'LokalController');
	Route::resource('matapelajaran','MataPelajaranController');
	Route::resource('gurumatapelajaran','GuruMataPelajaranController');
	Route::post('gurumatapelajaran/setguru','GuruMataPelajaranController@setGuru')->name('gurumatapelajaran.setguru');
	Route::post('gurumatapelajaran/display','GuruMataPelajaranController@displayGuru')->name('gurumatapelajaran.display');
	Route::post('gurumatapelajaran/save/{x}','GuruMataPelajaranController@setGuruSave')->name('gurumatapelajaran.setgurusave');
	Route::get('profile','ProfileController@index');
	Route::get('profile/edit','ProfileController@edit');
	Route::post('profile/update/guru','ProfileController@simpanGuru')->name('updateGuru');
	Route::post('profile/update/siswa','ProfileController@simpanSiswa')->name('updateSiswa');
	Route::get('/orangtua/cari','OrangTuaController@cari');
	Route::resource('orangtua', 'OrangTuaController');
	Route::resource('pa', 'PAController');
	Route::resource('pengaturan','PengaturanController');
	Route::resource('tahunajaran','TahunAjaranController');
	Route::resource('jurusan','JurusanController');
	Route::resource('jamajar','JamAjarController');
	Route::resource('jadwal','JadwalController');
	Route::post('jadwal/display','JadwalController@display')->name('jadwal.display');
	Route::resource('gurupengampu','GuruPengampuController');
	Route::post('gurupengampu/{id_mapel}/deletepengampu/{id_pengampu}','GuruPengampuController@deletePengampu')->name('gurupengampu.deletepengampu');
	Route::resource('profilsekolah','ProfilSekolahController');

	Route::group(['middleware'=>'orangTuaSaja'], function() {
	    Route::resource('info', 'InfoAnakController');
	    Route::get('nilai/{id}/lokal/{id_lokal}','NilaiAnakController@rapor')->name('rapor-anak');
	    Route::get('nilai/{id}/lokal/{id_lokal}/matapelajaran/{id_mapel?}','NilaiAnakController@rekap')->name('rekap-anak');
	    Route::post('nilai/getrapor/{id}','NilaiAnakController@getRapor')->name('getrapor');
	    Route::post('nilai/getrekap/{id}','NilaiAnakController@getRekap')->name('getrekap');
	    Route::resource('nilai', 'NilaiAnakController');
	});
});