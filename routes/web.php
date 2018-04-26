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
    Route::get('/seminar/{id}/edit','DosenController@seminarUpdateForm')->name('admin.dosen.seminarUpdateForm');
    Route::get('/seminar/view','DosenController@viewSeminarDosen')->name('admin.dosenSeminar.view');
    Route::post('/seminar/simpan','DosenController@storeKegiatanSeminar')->name('admin.seminar.store');
    Route::post('/seminar/update/{id}','DosenController@updateKegiatanSeminar')->name('admin.seminar.update');
    Route::post('/seminar/delete/{id}','DosenController@deleteKegiatanSeminar')->name('admin.seminar.delete');

    //Aktivitas Dosen
    Route::get('/aktivitas/form','DosenController@aktivitasDosenForm')->name('admin.dosen.aktivitas');
    Route::get('/aktivitas/view','DosenController@aktivitasDosenView')->name('admin.dosen.aktivitasView');
    Route::post('/aktivitas/store','DosenController@aktivitasDosenStore')->name('admin.dosen.aktivitasStore');
    Route::get('/aktivitas/{id}/edit','DosenController@aktivitasUpdateForm')->name('admin.dosen.aktivitasUpdateForm');
    Route::post('/aktivitas/update/{id}','DosenController@aktivitasDosenUpdate')->name('admin.dosen.aktivitasUpdate');
    Route::post('/aktivitas/delete/{id}','DosenController@aktivitasDosenDelete')->name('admin.dosen.aktivitasDelete');

    //Tugas Belajar Dosen
    Route::get('/tugas-belajar/form','DosenController@tugasBelajarForm')->name('admin.dosen.tugasBelajar');
    Route::get('/tugas-belajar/view','DosenController@tugasBelajarView')->name('admin.dosen.tugasBelajarView');
    Route::post('/tugas-belajar/store','DosenController@tugasBelajarStore')->name('admin.dosen.tugasBelajarStore');
    Route::get('/tugas-belajar/{id}/edit','DosenController@tugasBelajarUpdateForm')->name('admin.dosen.tugasBelajarUpdateForm');
    Route::post('/tugas-belajar/update/{id}','DosenController@tugasBelajarUpdate')->name('admin.dosen.tugasBelajarUpdate');
    Route::post('/tugas-belajar/delete/{id}','DosenController@tugasBelajarDelete')->name('admin.dosen.tugasBelajarDelete');
});

Route::prefix('publikasi')->group(function(){
    Route::get('/daftarTampil','PublikasiController@daftarView')->name('admin.publikasi.daftar');
    Route::get('/form','PublikasiController@formPublikasi')->name('admin.publikasi.inputForm');
    Route::post('/store','PublikasiController@storePublikasi')->name('admin.publikasi.storePublikasi');
    Route::get('/view','PublikasiController@viewPublikasi')->name('admin.publikasi.view');
    Route::get('/update/{id}/edit','PublikasiController@formUpdate')->name('admin.publikasi.formUpdate');
    Route::post('/update/{id}','PublikasiController@updatePublikasi')->name('admin.publikasi.update');
    Route::post('/delete/{id}','PublikasiController@deletePublikasi')->name('admin.publikasi.delete');

    //butir publikasi
    Route::get('/daftarTampil/listPublikasi','PublikasiController@listPublikasi')->name('publikasi.tampil.listPublikasi');
});

Route::prefix('penelitian')->group(function(){
    Route::get('/daftarTampil','PenelitianController@daftarView')->name('admin.penelitian.daftar');
    Route::get('/form','PenelitianController@formPenelitian')->name('admin.penelitian.inputForm');
    Route::post('/store','PenelitianController@storePenelitian')->name('admin.penelitian.storePenelitian');
    Route::get('/view','PenelitianController@viewPenelitian')->name('admin.penelitian.view');
    Route::get('/update/{id}/edit','PenelitianController@formUpdate')->name('admin.penelitian.formUpdate');
    Route::post('/update/{id}','PenelitianController@updatePenelitian')->name('admin.penelitian.update');
    Route::post('/delete/{id}','PenelitianController@deletePenelitian')->name('admin.penelitian.delete');

    //Bimbingan Penelitian
    Route::get('/bimbingan/form','PenelitianController@formBimbingan')->name('admin.penelitian.inputBimbingan');
    Route::post('/bimbingan/store','PenelitianController@storeBimbingan')->name('admin.penelitian.storeBimbingan');
    Route::get('/bimbingan/view','PenelitianController@viewBimbingan')->name('admin.penelitian.viewBimbingan');
    Route::get('/bimbingan/{id}/edit','PenelitianController@bimbinganFormUpdate')->name('admin.penelitian.bimbinganFormUpdate');
    Route::post('/bimbingan/update/{id}','PenelitianController@bimbinganUpdate')->name('admin.penelitian.bimbinganUpdate');
    Route::post('/bimbingan/delete/{id}','PenelitianController@deleteBimbingan')->name('admin.penelitian.bimbinganDelete');

    //bagian butir penelitian
    Route::get('/daftarTampil/dosenTetap','PenelitianController@penelitianDosenTetap')->name('penelitian.tampil.dosenTetap');
    Route::get('/daftarTampil/jumlahDanaPenelitian','PenelitianController@jumlahDanaPenelitian')->name('penelitian.tampil.jumlahDanaPenelitian');
    Route::get('/daftarTampil/penelitianTesis','PenelitianController@bimbinganList')->name('penelitian.tampil.bimbinganTesis');
    Route::get('/daftarTampil/penelitianDgnMhs','PenelitianController@penelitianDgnMhs')->name('penelitian.tampil.penelitianDgnMhs');
});

Route::prefix('mahasiswa')->group(function(){
    Route::get('/form','MahasiswaController@mahasiswaForm')->name('admin.mahasiswa.form');
    Route::post('/store','MahasiswaController@mahasiswaStore')->name('admin.mahasiswa.store');
    Route::get('/view','MahasiswaController@mahasiswaView')->name('admin.mahasiswa.view');
    Route::get('/update/{id}/edit','MahasiswaController@mahasiswaFormUpdate')->name('admin.mahasiswa.formUpdate');
    Route::post('/update/{id}','MahasiswaController@mahasiswaUpdate')->name('admin.mahasiswa.update');
    Route::post('/delete/{id}','MahasiswaController@mahasiswaDelete')->name('admin.mahasiswa.delete');

    //Penelitian Mahasiswa
    Route::get('/penelitian/view','MahasiswaController@mahasiswaPenelitianView')->name('mahasiswa.penelitian.view');
    Route::get('/penelitian/form','MahasiswaController@mahasiswaPenelitianForm')->name('mahasiswa.penelitian.form');
    Route::post('/penelitian/store','MahasiswaController@mahasiswaPenelitianStore')->name('mahasiswa.penelitian.store');
    Route::get('/penelitian/update/{id}/edit','MahasiswaController@mahasiswaPenelitianFormUpdate')->name('mahasiswa.penelitian.formUpdate');
    Route::post('/penelitian/update/{id}','MahasiswaController@mahasiswaPenelitianUpdate')->name('mahasiswa.penelitian.update');
    Route::post('/penelitian/delete/{id}','MahasiswaController@mahasiswaPenelitianDelete')->name('mahasiswa.penelitian.delete');
});