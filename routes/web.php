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

Route::prefix('dosen')->group(function(){
    Route::get('/daftarTampil','DosenController@daftarView')->name('admin.dosen.daftar');
    Route::get('/tampil','DosenController@viewDosen')->name('admin.dosen.index');
    Route::get('/form','DosenController@formDosen')->name('admin.dosen.inputForm');
    Route::post('/submitForm','DosenController@store')->name('admin.dosen.submit');
    Route::get('/{id}/edit','DosenController@editForm')->name('admin.dosen.editForm');
    Route::post('/update/{id}','DosenController@update')->name('admin.dosen.update');
    Route::post('/delete/{id}','DosenController@delete')->name('admin.dosen.delete');
    //view dosen tetap and tidak tetap
    Route::get('/tidakTetap','DosenController@viewDosenTidakTetap')->name('admin.dosen.tidakTetap');
    Route::get('/tetap','DosenController@viewDosenTetap')->name('admin.dosen.tetap');
    //prestasi dosen
    Route::get('/prestasi/form','DosenController@prestasiDosen')->name('admin.dosen.prestasi');
    Route::get('/prestasi/view','DosenController@viewPrestasiDosen')->name('admin.dosenPrestasi.view');
    Route::post('/prestasi/simpan','DosenController@storePrestasi')->name('admin.prestasi.store');
    Route::post('/prestasi/delete/{id}','DosenController@deletePrestasi')->name('admin.prestasi.delete');
    Route::get('/prestasi/{id}/edit','DosenController@editPrestasiForm')->name('admin.dosenPrestasi.editForm');
    Route::post('/prestasi/update/{id}','DosenController@updatePrestasi')->name('admin.prestasi.update');
    //pengalaman dosen tetap
    Route::get('/pengalaman/form','DosenController@pengalamanDosen')->name('admin.dosen.pengalaman');
    Route::get('/pengalaman/view','DosenController@viewPengalamanDosen')->name('admin.dosenPengalaman.view');
    Route::post('/pengalaman/simpan','DosenController@storePengalaman')->name('admin.pengalaman.store');
    Route::post('/pengalaman/delete/{id}','DosenController@deletePengalaman')->name('admin.pengalaman.delete');
    Route::get('/pengalaman/{id}/edit','DosenController@editPengalamanForm')->name('admin.dosenPengalaman.editForm');
    Route::post('/pengalaman/update/{id}','DosenController@updatePengalaman')->name('admin.pengalaman.update');
    //kegiatan seminar dosen
    Route::get('/seminar/form','DosenController@kegiatanSeminarDosen')->name('admin.dosen.seminar');
    Route::get('/seminar/view','DosenController@viewSeminarDosen')->name('admin.dosenSeminar.view');
    Route::post('/seminar/simpan','DosenController@storeKegiatanSeminar')->name('admin.seminar.store');
});

Route::prefix('publikasi')->group(function(){
    Route::get('/daftarTampil','PublikasiController@daftarView')->name('admin.publikasi.daftar');
    Route::get('/form','PublikasiController@formPublikasi')->name('admin.publikasi.inputForm');
    Route::post('/store','PublikasiController@storePublikasi')->name('admin.publikasi.storePublikasi');
    Route::get('/view','PublikasiController@viewPublikasi')->name('admin.publikasi.view');
    Route::get('/update/{id}/edit','PublikasiController@formUpdate')->name('admin.publikasi.formUpdate');
    Route::post('/update/{id}','PublikasiController@updatePublikasi')->name('admin.publikasi.update');
    Route::post('/delete/{id}','PublikasiController@deletePublikasi')->name('admin.publikasi.delete');
});

Route::prefix('penelitian')->group(function(){
    Route::get('/daftarTampil','PenelitianController@daftarView')->name('admin.penelitian.daftar');
    Route::get('/form','PenelitianController@formPenelitian')->name('admin.penelitian.inputForm');
    Route::post('/store','PenelitianController@storePenelitian')->name('admin.penelitian.storePenelitian');
    Route::get('/view','PenelitianController@viewPenelitian')->name('admin.penelitian.view');
    Route::get('/update/{id}/edit','PenelitianController@formUpdate')->name('admin.penelitian.formUpdate');
    Route::post('/update/{id}','PenelitianController@updatePenelitian')->name('admin.penelitian.update');
    Route::post('/delete/{id}','PenelitianController@deletePenelitian')->name('admin.penelitian.delete');
});