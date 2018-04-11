<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\JenisKegiatan;
use App\Pengalaman;
use App\Prestasi;
use App\RoleSeminar;
use App\Seminar;
use App\Tingkat;
use Illuminate\Http\Request;
use DateTime;

class DosenController extends Controller
{
    public function viewDosen()
    {
        $datas = Dosen::all();
        return view('pages.dosen.adminDosen')->withDatas($datas);
    }

    public function daftarView()
    {
        return view('pages.dosen.adminDaftarTampil');
    }

    public function formDosen()
    {
        return view('pages.dosen.adminDosenForm');
    }

    public function store(Request $request)
    {

        $this->validate($request,array(
            'nama' => 'required|max:255',
            'nidn'  => 'required|max:255',
        ));

        $data = new Dosen();
        $data->nama = $request->nama;
        $data->nidn = $request->nidn;
        $data->tanggal_lahir  = DateTime::createFromFormat('d/m/Y', $request->tanggalLahir)->format('Y-m-d');
        //$data->tanggal_lahir = $request->tanggalLahir;
        $data->jabatan_akademik = $request->jabatanAkademik;
        $data->gelar_akademik_s1 = $request->gelars1;
        $data->asal_pt_s1 = $request->asals1;
        $data->bidang_keahlian_s1 = $request->keahlians1;
        $data->gelar_akademik_s2 = $request->gelars2;
        $data->asal_pt_s2 = $request->asals2;
        $data->bidang_keahlian_s2 = $request->keahlians2;
        $data->gelar_akademik_s3 = $request->gelars3;
        $data->asal_pt_s3 = $request->asals3;
        $data->bidang_keahlian_s3 = $request->keahlians3;
        $data->status = $request->status;
        $data->sertifikasi = $request->sertifikasi;
        //dd($data->tanggal_lahir);
        $data->save();

        return redirect()->route('admin.dosen.index');
    }

    public function editForm($id){
        $data = Dosen::find($id);
        //dd($data);
        return view('pages.dosen.dosenFormEdit')->withData($data);
    }

    public function viewDosenTidakTetap()
    {
        $datas = Dosen::where('status',0)->orderBy('nama','desc')->get();
        return view('pages.dosen.adminDosenTidakTetap')->withDatas($datas);
    }

    public function viewDosenTetap()
    {
        $datas = Dosen::where('status',1)->orderBy('nama','desc')->get();
        return view('pages.dosen.adminDosenTetap')->withDatas($datas);
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
            'nama' => 'required|max:255',
            'tahunPencapaian'  => 'required|max:255',
            'prestasi' => 'required|max:255',
            'tingkat' => 'required|max:255',
        ));

        $data = new Prestasi();
        $data->nama_prestasi = $request->prestasi;
        $data->tahun_pencapaian = $request->tahunPencapaian;
        $data->tingkat_id = $request->tingkat;
        $data->dosen_id = $request->nama;
        $data->save();

        return redirect()->route('admin.dosen.index');
    }

    public function editPrestasiForm($id)
    {
        $data = Prestasi::find($id);
        $tingkats = Tingkat::all();
        return view('pages.dosen.prestasiFormEdit')->withData($data)->withTingkats($tingkats);
    }

    public function updatePrestasi(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'tahunPencapaian'  => 'required|max:255',
            'prestasi' => 'required|max:255',
            'tingkat' => 'required|max:255',
        ));

        $data = Prestasi::find($id);
        $data->nama_prestasi = $request->prestasi;
        $data->tahun_pencapaian = $request->tahunPencapaian;
        $data->tingkat_id = $request->tingkat;
        $data->dosen_id = $request->nama;
        $data->save();

        return redirect()->route('admin.dosenPrestasi.view');
    }


    public function viewPrestasiDosen()
    {
        $datas = Prestasi::all();
        return view('pages.dosen.viewPrestasiDosen')->withDatas($datas);
    }

    public function deletePrestasi($id)
    {
        $data = Prestasi::find($id);
        $data->delete();
        return redirect()->route('admin.dosenPrestasi.view');
    }

    public function pengalamanDosen()
    {
        $datas = Dosen::where('status',1)->orderBy('nama','desc')->get();
        $tingkats= Tingkat::all();
        return view('pages.dosen.pengalamanDosen')->withDatas($datas)->withTingkats($tingkats);
    }

    public function storePengalaman(Request $request)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'lembaga'  => 'required|max:255',
            'tahunAwal' => 'required|max:255',
            'tahunAkhir' => 'required|max:255',
        ));

        $data = new Pengalaman();
        $data->dosen_id = $request->nama;
        $data->lembaga = $request->lembaga;
        $data->tahun_awal = $request->tahunAwal;
        $data->tahun_akhir = $request->tahunAkhir;
        $data->tingkat_id = $request->tingkat;
        $data->save();

        return redirect()->route('admin.dosenPengalaman.view');
    }

    public function editPengalamanForm($id)
    {
        $data = Pengalaman::find($id);
        $tingkats = Tingkat::all();
        return view('pages.dosen.pengalamanFormEdit')->withData($data)->withTingkats($tingkats);
    }

    public function updatePengalaman(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'lembaga'  => 'required|max:255',
            'tahunAwal' => 'required|max:255',
            'tahunAkhir' => 'required|max:255',
        ));

        $data = Pengalaman::find($id);
        $data->dosen_id = $request->nama;
        $data->lembaga = $request->lembaga;
        $data->tahun_awal = $request->tahunAwal;
        $data->tahun_akhir = $request->tahunAkhir;
        $data->tingkat_id = $request->tingkat;
        $data->save();

        return redirect()->route('admin.dosenPengalaman.view');
    }

    public function viewPengalamanDosen()
    {
        $datas = Pengalaman::all();
        return view('pages.dosen.viewPengalamanDosen')->withDatas($datas);
    }

    public function deletePengalaman($id)
    {
        $data = Pengalaman::find($id);
        $data->delete();
        return redirect()->route('admin.dosenPengalaman.view');
    }

    public function viewSeminarDosen()
    {
        $datas = Seminar::all();
        return view('pages.dosen.viewSeminarDosen')->withDatas($datas);
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
            'nama' => 'required|max:255',
            'jenisKegiatan'  => 'required|max:255',
            'tahun' => 'required|max:255',
            'tempat' => 'required|max:255',
            'status' => 'required|max:255',
        ));

        $data = new Seminar();
        $data->dosen_id = $request->nama;
        $data->kegiatan_seminar_id = $request->jenisKegiatan;
        $data->tempat = $request->tempat;
        $data->tahun = $request->tahun;
        $data->seminar_role_id = $request->status;
        $data->save();

        return redirect()->route('admin.dosenSeminar.view');
    }


    public function update(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'nidn'  => 'required|max:255',
        ));

        $data = Dosen::find($id);
        $data->nama = $request->nama;
        $data->nidn = $request->nidn;
        $data->tanggal_lahir  = DateTime::createFromFormat('d/m/Y', $request->tanggalLahir)->format('Y-m-d');
        //$data->tanggal_lahir = $request->tanggalLahir;
        $data->jabatan_akademik = $request->jabatanAkademik;
        $data->gelar_akademik_s1 = $request->gelars1;
        $data->asal_pt_s1 = $request->asals1;
        $data->bidang_keahlian_s1 = $request->keahlians1;
        $data->gelar_akademik_s2 = $request->gelars2;
        $data->asal_pt_s2 = $request->asals2;
        $data->bidang_keahlian_s2 = $request->keahlians2;
        $data->gelar_akademik_s3 = $request->gelars3;
        $data->asal_pt_s3 = $request->asals3;
        $data->bidang_keahlian_s3 = $request->keahlians3;
        $data->status = $request->status;
        $data->sertifikasi = $request->sertifikasi;
        //dd($data->tanggal_lahir);
        $data->save();

        return redirect()->route('admin.dosen.index');
    }

    public function delete($id)
    {
        $post = Dosen::find($id);
        //Storage::delete($post->gambar);
        //File::delete($post->gambar);
        $post->prestasi()->delete();
        $post->pengalaman()->delete();
        $post->delete();
        return redirect()->route('admin.dosen.index');
    }
}
