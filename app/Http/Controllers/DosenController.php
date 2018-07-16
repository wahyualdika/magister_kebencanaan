<?php

namespace App\Http\Controllers;

use App\AktivitasDosen;
use App\Country;
use App\Dosen;
use App\JabatanAkademik;
use App\JenisKegiatan;
use App\Pengalaman;
use App\Prestasi;
use App\RoleSeminar;
use App\Seminar;
use App\Tingkat;
use App\TugasBelajar;
use Illuminate\Http\Request;
use DateTime;

class DosenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cariDosen(Request $request)
    {
      $nama  = $request->nama;
      $datas = Dosen::where('nama', 'like', '%' . $nama . '%')->get();
      return view('pages.dosen.hasilDosen')->withDatas($datas);
    }


    public function viewDosen()
    {
        $datas = Dosen::paginate(20);
        return view('pages.dosen.adminDosen')->withDatas($datas);
    }

    public function daftarView()
    {
        return view('pages.dosen.adminDaftarTampil');
    }

    public function formDosen()
    {
        $jabatans = JabatanAkademik::all();
        return view('pages.dosen.adminDosenForm')->withJabatans($jabatans);
    }

    public function store(Request $request)
    {

        $this->validate($request,array(
            'nama'  => 'required|max:255',
            'nidn'  => 'required|max:255',
        ));

        $data                        = new Dosen();
        $data->nama                  = $request->nama;
        $data->nidn                  = $request->nidn;
        $data->tanggal_lahir         = DateTime::createFromFormat('d/m/Y', $request->tanggalLahir)->format('Y-m-d');
        $data->jabatan_akademik_id   = $request->jabatanAkademik;
        $data->gelar_akademik_s1     = $request->gelars1;
        $data->asal_pt_s1            = $request->asals1;
        $data->bidang_keahlian_s1    = $request->keahlians1;
        $data->gelar_akademik_s2     = $request->gelars2;
        $data->asal_pt_s2            = $request->asals2;
        $data->bidang_keahlian_s2    = $request->keahlians2;
        $data->gelar_akademik_s3     = $request->gelars3;
        $data->asal_pt_s3            = $request->asals3;
        $data->bidang_keahlian_s3    = $request->keahlians3;
        $data->status                = $request->status;
        $data->sertifikasi           = $request->sertifikasi;

        $data->save();

        return redirect()->route('admin.dosen.index');
    }

    public function editForm($id){
        $data       = Dosen::find($id);
        $jabatans   = JabatanAkademik::all();
        //dd($data);
        return view('pages.dosen.dosenFormEdit')->withData($data)->withJabatans($jabatans);
    }

    public function viewDosenTidakTetap()
    {
        $datas = Dosen::where('status',0)->orderBy('nama','desc')->paginate(20);
        return view('pages.dosen.adminDosenTidakTetap')->withDatas($datas);
    }

    public function viewDosenTetap()
    {
        $datas  = Dosen::where('status',1)->orderBy('nama','desc')->paginate(20);
        $guru   = Dosen::where('jabatan_akademik_id',1)->count();
        $kepala = Dosen::where('jabatan_akademik_id',2)->count();
        $s3     = Dosen::where('gelar_akademik_s3','!=',null)->count();

        return view('pages.dosen.adminDosenTetap')->withDatas($datas)
                                                        ->withGuru($guru)
                                                        ->withKepala($kepala)
                                                        ->withS3($s3);
    }

    public function prestasiDosen()
    {
        $datas = Dosen::all();
        $tingkats= Tingkat::all();
        return view('pages.dosen.prestasiDosen')->withDatas($datas)->withTingkats($tingkats);
    }

    public function storePrestasi(Request $request)
    {
        $this->validate($request,array(
            'nama'              => 'required|max:255',
            'tahunPencapaian'   => 'required|max:255',
            'prestasi'          => 'required|max:255',
            'tingkat'           => 'required|max:255',
        ));

        $data                   = new Prestasi();
        $data->nama_prestasi    = $request->prestasi;
        $data->tahun_pencapaian = $request->tahunPencapaian;
        $data->tingkat_id       = $request->tingkat;
        $data->dosen_id         = $request->nama;
        $data->save();

        return redirect()->route('admin.dosenPrestasi.view');
    }

    public function editPrestasiForm($id)
    {
        $data     = Prestasi::find($id);
        $tingkats = Tingkat::all();
        return view('pages.dosen.prestasiFormEdit')->withData($data)->withTingkats($tingkats);
    }

    public function updatePrestasi(Request $request,$id)
    {
        $this->validate($request,array(
            'nama'              => 'required|max:255',
            'tahunPencapaian'   => 'required|max:255',
            'prestasi'          => 'required|max:255',
            'tingkat'           => 'required|max:255',
        ));

        $data                   = Prestasi::find($id);
        $data->nama_prestasi    = $request->prestasi;
        $data->tahun_pencapaian = $request->tahunPencapaian;
        $data->tingkat_id       = $request->tingkat;
        $data->dosen_id         = $request->nama;
        $data->save();

        return redirect()->route('admin.dosenPrestasi.view');
    }


    public function viewPrestasiDosen()
    {
        $tingkats       = array();
        $lokal          = Prestasi::where('tingkat_id',1)->count();
        $nasional       = Prestasi::where('tingkat_id',2)->count();
        $internasional  = Prestasi::where('tingkat_id',3)->count();

        $tingkats[0] = $lokal;
        $tingkats[1] = $nasional;
        $tingkats[2] = $internasional;
        $datas = Prestasi::paginate(20);
        return view('pages.dosen.viewPrestasiDosen')->withDatas($datas)->withTingkats($tingkats);
    }

    public function deletePrestasi($id)
    {
        $data = Prestasi::find($id);
        $data->delete();
        return redirect()->route('admin.dosenPrestasi.view');
    }

    public function pengalamanDosen()
    {
        $datas      = Dosen::where('status',1)->orderBy('nama','desc')->get();
        $tingkats   = Tingkat::all();
        return view('pages.dosen.pengalamanDosen')->withDatas($datas)->withTingkats($tingkats);
    }

    public function storePengalaman(Request $request)
    {
        $this->validate($request,array(
            'nama'          => 'required|max:255',
            'lembaga'       => 'required|max:255',
            'tahunAwal'     => 'required|max:255',
            'tahunAkhir'    => 'required|max:255',
        ));

        $data                   = new Pengalaman();
        $data->dosen_id         = $request->nama;
        $data->lembaga          = $request->lembaga;
        $data->tahun_awal       = $request->tahunAwal;
        $data->tahun_akhir      = $request->tahunAkhir;
        $data->tingkat_id       = $request->tingkat;
        $data->save();

        return redirect()->route('admin.dosenPengalaman.view');
    }

    public function editPengalamanForm($id)
    {
        $data       = Pengalaman::find($id);
        $tingkats   = Tingkat::all();
        return view('pages.dosen.pengalamanFormEdit')->withData($data)->withTingkats($tingkats);
    }

    public function updatePengalaman(Request $request,$id)
    {
        $this->validate($request,array(
            'nama'          => 'required|max:255',
            'lembaga'       => 'required|max:255',
            'tahunAwal'     => 'required|max:255',
            'tahunAkhir'    => 'required|max:255',
        ));

        $data               = Pengalaman::find($id);
        $data->dosen_id     = $request->nama;
        $data->lembaga      = $request->lembaga;
        $data->tahun_awal   = $request->tahunAwal;
        $data->tahun_akhir  = $request->tahunAkhir;
        $data->tingkat_id   = $request->tingkat;
        $data->save();

        return redirect()->route('admin.dosenPengalaman.view');
    }

    public function viewPengalamanDosen()
    {
        $tingkats      = array();
        $nasional      = Pengalaman::where('tingkat_id',2)->count();
        $internasional = Pengalaman::where('tingkat_id',3)->count();

        $tingkats[0] = $nasional;
        $tingkats[1] = $internasional;
        $datas       = Pengalaman::paginate(20);

        return view('pages.dosen.viewPengalamanDosen')->withDatas($datas)->withTingkats($tingkats);
    }

    public function deletePengalaman($id)
    {
        $data = Pengalaman::find($id);
        $data->delete();
        return redirect()->route('admin.dosenPengalaman.view');
    }

    public function viewSeminarDosen()
    {
        $penyaji = Seminar::where('seminar_role_id',1)->count();
        $peserta = Seminar::where('seminar_role_id',2)->count();

        $rolearr    = array();
        $rolearr[0] = $penyaji;
        $rolearr[1] = $peserta;

        $datas      = Seminar::paginate(15);
        return view('pages.dosen.viewSeminarDosen')->withDatas($datas)->withRolearr($rolearr);
    }

    public function kegiatanSeminarDosen()
    {

        $datas      = Dosen::where('status',1)->orderBy('nama','desc')->get();
        $roles      = RoleSeminar::all();
        $kegiatans  = JenisKegiatan::all();
        return view('pages.dosen.kegiatanSeminarDosen')->withDatas($datas)
                                                             ->withRoles($roles)
                                                             ->withKegiatans($kegiatans);
    }

    public function storeKegiatanSeminar(Request $request)
    {
        $this->validate($request,array(
            'nama'              => 'required|max:255',
            'jenisKegiatan'     => 'required|max:255',
            'tahun'             => 'required|max:255',
            'tempat'            => 'required|max:255',
            'status'            => 'required|max:255',
        ));

        $data                        = new Seminar();
        $data->dosen_id              = $request->nama;
        $data->kegiatan_seminar_id   = $request->jenisKegiatan;
        $data->tempat                = $request->tempat;
        $data->tahun                 = $request->tahun;
        $data->seminar_role_id       = $request->status;
        $data->save();

        return redirect()->route('admin.dosenSeminar.view');
    }

    public function seminarUpdateForm($id)
    {
        $datas      = Seminar::find($id);
        $dosens     = Dosen::where('status',1)->orderBy('nama','desc')->get();
        $roles      = RoleSeminar::all();
        $kegiatans  = JenisKegiatan::all();
        return view('pages.dosen.seminarUpdateForm')->withDatas($datas)->withDosens($dosens)
            ->withRoles($roles)
            ->withKegiatans($kegiatans);
    }

    public function updateKegiatanSeminar(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'jenisKegiatan'  => 'required|max:255',
            'tahun' => 'required|max:255',
            'tempat' => 'required|max:255',
            'status' => 'required|max:255',
        ));

        $data = Seminar::find($id);
        $data->dosen_id = $request->nama;
        $data->kegiatan_seminar_id = $request->jenisKegiatan;
        $data->tempat = $request->tempat;
        $data->tahun = $request->tahun;
        $data->seminar_role_id = $request->status;
        $data->save();

        return redirect()->route('admin.dosenSeminar.view');
    }

    public function deleteKegiatanSeminar($id)
    {
        $data = Seminar::find($id);
        $data->delete();
        return redirect()->route('admin.dosenSeminar.view');
    }


    public function update(Request $request,$id)
    {
        $this->validate($request,array(
            'nama'  => 'required|max:255',
            'nidn'  => 'required|max:255',
        ));

        $data                           = Dosen::find($id);
        $data->nama                     = $request->nama;
        $data->nidn                     = $request->nidn;
        $data->tanggal_lahir            = DateTime::createFromFormat('d/m/Y', $request->tanggalLahir)->format('Y-m-d');
        $data->jabatan_akademik_id      = $request->jabatanAkademik;
        $data->gelar_akademik_s1        = $request->gelars1;
        $data->asal_pt_s1               = $request->asals1;
        $data->bidang_keahlian_s1       = $request->keahlians1;
        $data->gelar_akademik_s2        = $request->gelars2;
        $data->asal_pt_s2               = $request->asals2;
        $data->bidang_keahlian_s2       = $request->keahlians2;
        $data->gelar_akademik_s3        = $request->gelars3;
        $data->asal_pt_s3               = $request->asals3;
        $data->bidang_keahlian_s3       = $request->keahlians3;
        $data->status                   = $request->status;
        $data->sertifikasi              = $request->sertifikasi;

        $data->save();

        return redirect()->route('admin.dosen.index');
    }

    //Aktivitas Dosen
    public function aktivitasDosenView()
    {

        $datas  = AktivitasDosen::paginate(15);
        $amount = $datas->count();
        return view('pages.dosen.aktivitasDosenView')->withDatas($datas)->withAmount($amount);
    }

    public function aktivitasDosenForm()
    {
        $dosens = Dosen::where('status',1)->get();
        return view('pages.dosen.aktivitasDosenInput')->withDosens($dosens);
    }

    public function aktivitasDosenStore(Request $request)
    {
        $this->validate($request,array(
            'nama'                 => 'required|max:255',
            'pengajaranPsSendiri'  => 'required|max:255',
            'pengajaranPsLain'     => 'required|max:255',
            'pengajaranPtLain'     => 'required|max:255',
            'sksPenelitian'        => 'required|max:255',
            'sksPengabdian'        => 'required|max:255',
            'manajemenPtSendiri'   => 'required|max:255',
            'manajemenPtLain'      => 'required|max:255',
        ));

        $data                            = new AktivitasDosen();
        $data->dosen_id                  = $request->nama;
        $data->sks_ps_sendiri            = $request->pengajaranPsSendiri;
        $data->sks_ps_lain               = $request->pengajaranPsLain;
        $data->sks_ps_ptLain             = $request->pengajaranPtLain;
        $data->sks_penelitian            = $request->sksPenelitian;
        $data->sks_pengabdian_masyarakat = $request->sksPengabdian;
        $data->sks_manajemen_ptSendiri   = $request->manajemenPtSendiri;
        $data->sks_manajemen_ptLain      = $request->manajemenPtLain;

        $data->save();
        return redirect()->route('admin.dosen.aktivitasView');
    }

    public function aktivitasUpdateForm($id)
    {
        $dosens = Dosen::where('status',1)->get();
        $data   = AktivitasDosen::find($id);

        return view('pages.dosen.aktivitasDosenUpdate')->withDosens($dosens)->withData($data);
    }

    public function aktivitasDosenUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama'                  => 'required|max:255',
            'pengajaranPsSendiri'   => 'required|max:255',
            'pengajaranPsLain'      => 'required|max:255',
            'pengajaranPtLain'      => 'required|max:255',
            'sksPenelitian'         => 'required|max:255',
            'sksPengabdian'         => 'required|max:255',
            'manajemenPtSendiri'    => 'required|max:255',
            'manajemenPtLain'       => 'required|max:255',
        ));

        $data                            = AktivitasDosen::find($id);
        $data->dosen_id                  = $request->nama;
        $data->sks_ps_sendiri            = $request->pengajaranPsSendiri;
        $data->sks_ps_lain               = $request->pengajaranPsLain;
        $data->sks_ps_ptLain             = $request->pengajaranPtLain;
        $data->sks_penelitian            = $request->sksPenelitian;
        $data->sks_pengabdian_masyarakat = $request->sksPengabdian;
        $data->sks_manajemen_ptSendiri   = $request->manajemenPtSendiri;
        $data->sks_manajemen_ptLain      = $request->manajemenPtLain;

        $data->save();
        return redirect()->route('admin.dosen.aktivitasView');
    }

    public function aktivitasDosenDelete($id)
    {
        $post = AktivitasDosen::find($id);
        $post->delete();
        return redirect()->route('admin.dosen.aktivitasView');
    }

    public function tugasBelajarView()
    {
        $datas = TugasBelajar::paginate(15);
        $s3 = TugasBelajar::where('jenjang_pendidikan_lanjut',3)->count();
        return view('pages.dosen.tugasBelajarView')->withDatas($datas)->withS3($s3);
    }

    public function tugasBelajarForm()
    {
        $negaras = Country::all();
        $dosens = Dosen::where('status',1)->get();
        return view('pages.dosen.tugasBelajarForm')->withNegaras($negaras)->withDosens($dosens);
    }

    public function tugasBelajarStore(Request $request)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'jenjangPendidikan'  => 'required|max:255',
            'bidangStudi'  => 'required|max:255',
            'perguruanTinggi'  => 'required|max:255',
            'negara'  => 'required|max:255',
            'tahun' => 'required|max:255',
        ));

        $data = new TugasBelajar();
        $data->dosen_id = $request->nama;
        $data->jenjang_pendidikan_lanjut = $request->jenjangPendidikan;
        $data->bidang_studi = $request->bidangStudi;
        $data->perguruan_tinggi = $request->perguruanTinggi;
        $data->negara = $request->negara;
        $data->tahun_mulai_studi = $request->tahun;

        $data->save();
        return redirect()->route('admin.dosen.tugasBelajarView');
    }

    public function tugasBelajarUpdateForm($id)
    {
        $negaras = Country::all();
        $data = TugasBelajar::find($id);
        return view('pages.dosen.tugasBelajarUpdateForm')->withNegaras($negaras)->withData($data);
    }

    public function tugasBelajarUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'jenjangPendidikan'  => 'required|max:255',
            'bidangStudi'  => 'required|max:255',
            'perguruanTinggi'  => 'required|max:255',
            'negara'  => 'required|max:255',
            'tahun' => 'required|max:255',
        ));

        $data = TugasBelajar::find($id);
        $data->dosen_id = $request->nama;
        $data->jenjang_pendidikan_lanjut = $request->jenjangPendidikan;
        $data->bidang_studi = $request->bidangStudi;
        $data->perguruan_tinggi = $request->perguruanTinggi;
        $data->negara = $request->negara;
        $data->tahun_mulai_studi = $request->tahun;

        $data->save();
        return redirect()->route('admin.dosen.tugasBelajarView');
    }

    public function tugasBelajarDelete($id)
    {
        $data = TugasBelajar::find($id);
        $data->delete();
        return redirect()->route('admin.dosen.tugasBelajarView');
    }

    public function delete($id)
    {
        $post = Dosen::find($id);
        //Storage::delete($post->gambar);
        //File::delete($post->gambar);
        $post->prestasi()->delete();
        $post->pengalaman()->delete();
        $post->seminar()->delete();
        $post->aktivitas()->delete();
        $post->tugasBelajar()->delete();
        $post->aktivitas()->delete();
        $post->bimbingan()->delete();
        $post->publikasi()->detach();
        $post->penelitian()->detach();
        $post->delete();
        return redirect()->route('admin.dosen.index');
    }
}
