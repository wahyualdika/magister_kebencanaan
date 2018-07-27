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
    return view('auth.login');
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

    //Pencarian Dosen
    Route::post('/cari/dosen','DosenController@cariDosen')->name('admin.dosen.cari');

    //Data Per Dosen
    Route::get('/detail/{id}','DosenController@detailViewDosen')->name('admin.dosen.viewDetail');
    Route::get('/detail/{id}/{tipeData}','DosenController@detailDataDosen')->name('admin.dosen.viewData');
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
    //Daftar Tampil
    Route::get('/daftarTampil','MahasiswaController@daftarView')->name('admin.mahasiswa.daftar');

    //Data Mahasiswa
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

    //mahasiswa dan lulusan
    Route::get('/mhs_dan_lulusan/view','MahasiswaController@viewAllLulusanMhs')->name('mahasiswa.lulusan.view');
    Route::get('/mhs_dan_lulusan/viewOnly','MahasiswaController@viewOnlyMhs')->name('mahasiswa.lulusan.viewOnly');
    Route::get('/mhs_dan_lulusan/form','MahasiswaController@formLulusanMhs')->name('mahasiswa.lulusan.form');
    Route::post('/mhs_dan_lulusan/store','MahasiswaController@storeLulusanMhs')->name('mahasiswa.lulusan.store');
    Route::post('/mhs_dan_lulusan/delete/{id}','MahasiswaController@deleteLulusanMhs')->name('mahasiswa.lulusan.delete');
    Route::get('/mhs_dan_lulusan/update/{id}/edit','MahasiswaController@formUpdateLulusanMhs')->name('mahasiswa.lulusan.formUpdate');
    Route::post('/mhs_dan_lulusan/update/{id}','MahasiswaController@updateLulusanMhs')->name('mahasiswa.lulusan.update');

    //Mahasiswa dan dana
    Route::get('/mhs_dan_dana/view','MahasiswaController@viewAllDanaMhs')->name('mahasiswa.dana.view');
    Route::get('/mhs_dan_dana/form','MahasiswaController@formDanaMhs')->name('mahasiswa.dana.form');
    Route::post('/mhs_dan_dana/store','MahasiswaController@storeDanaMhs')->name('mahasiswa.dana.store');
    Route::get('/mhs_dan_dana/update/{id}/edit','MahasiswaController@formUpdateDanaMhs')->name('mahasiswa.dana.formUpdate');
    Route::post('/mhs_dan_dana/update/{id}','MahasiswaController@updateDanaMhs')->name('mahasiswa.dana.update');
    Route::post('/mhs_dan_dana/delete/{id}','MahasiswaController@deleteDanaMhs')->name('mahasiswa.dana.delete');

    //Evaluasi Lulusan
    Route::get('/evaluasi_lulusan/form','MahasiswaController@formEvaLulusan')->name('evaluasi.lulusan.form');
    Route::get('/evaluasi_lulusan/view','MahasiswaController@viewEvaLulusan')->name('evaluasi.lulusan.view');
    Route::post('/evaluasi_lulusan/store','MahasiswaController@storeEvaLulusan')->name('evaluasi.lulusan.store');
    Route::get('/evaluasi_lulusan/update/{id}/edit','MahasiswaController@formUpdateEvaLulusan')->name('evaluasi.lulusan.formUpdate');
    Route::post('/evaluasi_lulusan/update/{id}','MahasiswaController@updateEvaLulusan')->name('evaluasi.lulusan.update');
    Route::post('/evaluasi_lulusan/delete/{id}','MahasiswaController@deleteEvaLulusan')->name('evaluasi.lulusan.delete');

    //Data Alumni
    Route::get('/alumni/form','MahasiswaController@alumniForm')->name('admin.alumni.form');
    Route::post('/alumni/store','MahasiswaController@storeAlumni')->name('admin.alumni.store');
    Route::get('/alumni/view','MahasiswaController@alumniView')->name('admin.alumni.view');
    Route::get('/alumni/update/{id}/edit','MahasiswaController@alumniFormUpdate')->name('admin.alumni.formUpdate');
    Route::post('/alumni/update/{id}','MahasiswaController@alumniUpdate')->name('admin.alumni.update');
    Route::post('/alumni/delete/{id}','MahasiswaController@alumniDelete')->name('admin.alumni.delete');
});

Route::prefix('mata_kuliah')->group(function(){
    Route::get('/daftar_tampil/view','KurikulumController@daftarTampil')->name('mataKuliah.daftarTampil.view');

    Route::get('/struktur_kurikulum/view','KurikulumController@kurikulumView')->name('mataKuliah.struktur.view');
    Route::get('/struktur_kurikulum/form','KurikulumController@kurikulumForm')->name('mataKuliah.struktur.form');
    Route::post('/struktur_kurikulum/store','KurikulumController@storeKurikulum')->name('mataKuliah.struktur.store');
    Route::get('/struktur_kurikulum/update/{id}/edit','KurikulumController@kurikulumFormUpdate')->name('mataKuliah.struktur.formUpdate');
    Route::post('/struktur_kurikulum/update/{id}','KurikulumController@kurikulumUpdate')->name('mataKuliah.struktur.update');
    Route::post('/struktur_kurikulum/delete/{id}','KurikulumController@kurikulumDelete')->name('mataKuliah.struktur.delete');
    Route::get('/struktur_kurikulum/kelengkapan/download/{id}/{name}','KurikulumController@kurikulumDownloadKelengkapan')->name('mataKuliah.struktur.download');

    //MATA KULIAH PILIHAN SECTION
    Route::get('/struktur_kurikulum/mk_pilihan/view','KurikulumController@mkPilihanView')->name('mataKuliah.pilihan.view');
    Route::get('/struktur_kurikulum/mk_pilihan/form','KurikulumController@mkPilihanForm')->name('mataKuliah.pilihan.form');
    Route::post('/struktur_kurikulum/mk_pilihan/store','KurikulumController@storeMkPilihan')->name('mataKuliah.pilihan.store');
    Route::post('/struktur_kurikulum/mk_pilihan/getAjaxMk','KurikulumController@getAjaxMk')->name('mataKuliah.pilihan.getAjaxMk');
    Route::get('/struktur_kurikulum/mk_pilihan/update/{id}/edit','KurikulumController@mkPilihanFormUpdate')->name('mataKuliah.pilihan.formUpdate');
    Route::post('/struktur_kurikulum/mk_pilihan/updateAjaxMk','KurikulumController@updateAjaxMk')->name('mataKuliah.pilihan.updateAjaxMk');
    Route::post('/struktur_kurikulum/mk_pilihan/update/{id}','KurikulumController@mkPilihanUpdate')->name('mataKuliah.pilihan.update');
    Route::post('/struktur_kurikulum/mk_pilihan/delete/{id}','KurikulumController@mkPilihanDelete')->name('mataKuliah.pilihan.delete');

    //SKS MINIMAL MK
    Route::get('/struktur_kurikulum/sks_minimal/view','KurikulumController@sksMinimalView')->name('mataKuliah.sksMinimal.view');
    Route::get('/struktur_kurikulum/sks_minimal/form','KurikulumController@sksMinimalForm')->name('mataKuliah.sksMinimal.form');
    Route::post('/struktur_kurikulum/sks_minimal/store','KurikulumController@storeSKSMinimal')->name('mataKuliah.sksMinimal.store');
    Route::get('/struktur_kurikulum/sks_minimal/update/{id}/edit','KurikulumController@sksMinimalFormUpdate')->name('mataKuliah.sksMinimal.formUpdate');
    Route::post('/struktur_kurikulum/sks_minimal/update/{id}','KurikulumController@sksMinimalUpdate')->name('mataKuliah.sksMinimal.update');
    Route::post('/struktur_kurikulum/sks_minimal/delete/{id}','KurikulumController@sksMinimalDelete')->name('mataKuliah.sksMinimal.delete');
});

Route::prefix('staff')->group(function(){
    Route::get('/view','StaffController@staffView')->name('admin.staff.view');
    Route::get('/form','StaffController@staffForm')->name('admin.staff.form');
    Route::post('/store','StaffController@staffStore')->name('admin.staff.store');
    Route::get('/staff/update/{id}/edit','StaffController@staffFormUpdate')->name('admin.staff.formUpdate');
    Route::post('/staff/update/{id}','StaffController@staffUpdate')->name('admin.staff.update');
    Route::post('/staff/delete/{id}','StaffController@staffDelete')->name('admin.staff.delete');
});

Route::prefix('tenaga_ahli')->group(function(){
    Route::get('/kegiatan/view','TenagaAhliController@tenagaAhliView')->name('tenagaAhli.kegiatan.view');
    Route::get('/kegiatan/form','TenagaAhliController@tenagaAhliForm')->name('tenagaAhli.kegiatan.form');
    Route::post('/kegiatan/store','TenagaAhliController@tenagaAhliStore')->name('tenagaAhli.kegiatan.store');
    Route::get('/kegiatan/update/{id}/edit','TenagaAhliController@tenagaAhliFormUpdate')->name('tenagaAhli.kegiatan.formUpdate');
    Route::post('/kegiatan/update/{id}','TenagaAhliController@tenagaAhliUpdate')->name('tenagaAhli.kegiatan.update');
    Route::post('/kegiatan/delete/{id}','TenagaAhliController@tenagaAhliDelete')->name('tenagaAhli.kegiatan.delete');
});

Route::prefix('pengabdian_masyarakat')->group(function(){
    Route::get('/daftarTampil/view','PengabdianMasyarakatController@daftarTampil')->name('admin.pengabdian.daftarTampil');
    Route::get('/listJumlah/view','PengabdianMasyarakatController@pengabdianListJumlahView')->name('admin.pengabdianJumah.view');
    Route::get('/view','PengabdianMasyarakatController@pengabdianView')->name('admin.pengabdian.view');
    Route::get('/form','PengabdianMasyarakatController@pengabdianForm')->name('admin.pengabdian.form');
    Route::post('/store','PengabdianMasyarakatController@pengabdianStore')->name('admin.pengabdian.store');
    Route::get('/update/{id}/edit','PengabdianMasyarakatController@pengabdianFormUpdate')->name('admin.pengabdian.formUpdate');
    Route::post('/update/{id}','PengabdianMasyarakatController@pengabdianUpdate')->name('admin.pengabdian.update');
    Route::post('/delete/{id}','PengabdianMasyarakatController@pengabdianDelete')->name('admin.pengabdian.delete');
});

Route::prefix('ruang_kerja')->group(function(){
    Route::get('/view','RuangKerjaController@ruangKerjaView')->name('admin.ruangKerja.view');
    Route::get('/form','RuangKerjaController@ruangKerjaForm')->name('admin.ruangKerja.form');
    Route::post('/store','RuangKerjaController@ruangKerjaStore')->name('admin.ruangKerja.store');
    Route::get('/update/{id}/edit','RuangKerjaController@ruangKerjaFormUpdate')->name('admin.ruangKerja.formUpdate');
    Route::post('/update/{id}','RuangKerjaController@ruangKerjaUpdate')->name('admin.ruangKerja.update');
    Route::post('/delete/{id}','RuangKerjaController@ruangKerjaDelete')->name('admin.ruangKerja.delete');
});

Route::prefix('pustaka')->group(function(){
    Route::get('/view','PustakaController@pustakaView')->name('admin.pustaka.view');
    Route::get('/form','PustakaController@pustakaForm')->name('admin.pustaka.form');
    Route::post('/store','PustakaController@pustakaStore')->name('admin.pustaka.store');
    Route::get('/update/{id}/edit','PustakaController@pustakaFormUpdate')->name('admin.pustaka.formUpdate');
    Route::post('/update/{id}','PustakaController@pustakaUpdate')->name('admin.pustaka.update');
    Route::post('/delete/{id}','PustakaController@pustakaDelete')->name('admin.pustaka.delete');
});

Route::prefix('aksesibilitas_data')->group(function(){
    Route::get('/view','AksesibilitasDataController@aksesibilitasDataView')->name('admin.aksesibilitasData.view');
    Route::get('/form','AksesibilitasDataController@aksesibilitasDataForm')->name('admin.aksesibilitasData.form');
    Route::post('/store','AksesibilitasDataController@aksesibilitasDataStore')->name('admin.aksesibilitasData.store');
    Route::get('/update/{id}/edit','AksesibilitasDataController@aksesibilitasDataFormUpdate')->name('admin.aksesibilitasData.formUpdate');
    Route::post('/update/{id}','AksesibilitasDataController@aksesibilitasDataUpdate')->name('admin.aksesibilitasData.update');
    Route::post('/delete/{id}','AksesibilitasDataController@aksesibilitasDataDelete')->name('admin.aksesibilitasData.delete');
});

Route::prefix('alokasi_dana')->group(function(){
    Route::get('/view','AlokasiDanaController@alokasiDanaView')->name('admin.alokasiDana.view');
    Route::get('/form','AlokasiDanaController@alokasiDanaForm')->name('admin.alokasiDana.form');
    Route::post('/store','AlokasiDanaController@alokasiDanaStore')->name('admin.alokasiDana.store');
    Route::get('/update/{id}/edit','AlokasiDanaController@alokasiDanaFormUpdate')->name('admin.alokasiDana.formUpdate');
    Route::post('/update/{id}','AlokasiDanaController@alokasiDanaUpdate')->name('admin.alokasiDana.update');
    Route::post('/delete/{id}','AlokasiDanaController@alokasiDanaDelete')->name('admin.alokasiDana.delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
