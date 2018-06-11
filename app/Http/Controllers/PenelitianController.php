<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\JabatanAkademik;
use App\PembimbingTesis;
use App\Penelitian;
use App\PenelitianMahasiswa;
use App\SumberDana;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    public function daftarView()
    {
        return view('pages.penelitian.daftarTampil');
    }

    public function viewPenelitian()
    {
        $datas = Penelitian::all();
        return view('pages.penelitian.viewPenelitian')->withDatas($datas);
    }

    public function formPenelitian()
    {
        $dosens = Dosen::where('status',1)->orderBy('nama','desc')->get();
        $sdanas = SumberDana::all();
        return view('pages.penelitian.formInput')->withDosens($dosens)->withSdanas($sdanas);
    }

    public function storePenelitian(Request $request)
    {
        $this->validate($request,array(
            'judul' => 'required|max:255',
            'tahunPenelitian' => 'max:255',
            'jumlahDana' => 'required|max:255',
            'jumlahMahasiswa' => 'required|max:255',
            'sumberDana' => 'required|max:255',
            'mhsTerkait' => 'max:255',
            'mhsTakTerkait' => 'max:255',
        ));
        $data = new Penelitian();
        $data->judul = $request->judul;
        $data->tahun_penelitian = $request->tahunPenelitian;
        $data->sumber_dana_id = $request->sumberDana;
        $data->jumlah_dana = $request->jumlahDana;
        $data->jumlah_mahasiswa = $request->jumlahMahasiswa;
        $data->mhs_terkait = $request->mhsTerkait;
        $data->mhs_tdk_terkait = $request->mhsTakTerkait;
        //dd($data);
        $data->save();

        if(isset($request->nama))
        {
            $data->dosen()->sync($request->nama,false);
        }else{
            $data->dosen()->sync(array());
        }

        //return 'berhasil';
        return redirect()->route('admin.penelitian.view');
    }

    public function formUpdate($id)
    {
        $dosens = Dosen::where('status',1)->orderBy('nama','desc')->get();
        $sdanas = SumberDana::all();
        $datas  = Penelitian::find($id);
        return view('pages.penelitian.formUpdate')->withDosens($dosens)->withSdanas($sdanas)->withDatas($datas);
    }

    public function updatePenelitian(Request $request,$id)
    {
        $this->validate($request,array(
            'judul' => 'required|max:255',
            'tahunPenelitian' => 'max:255',
            'jumlahDana' => 'required|max:255',
            'jumlahMahasiswa' => 'required|max:255',
            'sumberDana' => 'required|max:255',
            'mhsTerkait' => 'max:255',
            'mhsTakTerkait' => 'max:255',
        ));
        $data = Penelitian::find($id);
        $data->judul = $request->judul;
        $data->tahun_penelitian = $request->tahunPenelitian;
        $data->sumber_dana_id = $request->sumberDana;
        $data->jumlah_dana = $request->jumlahDana;
        $data->jumlah_mahasiswa = $request->jumlahMahasiswa;
        $data->mhs_terkait = $request->mhsTerkait;
        $data->mhs_tdk_terkait = $request->mhsTakTerkait;
        //dd($data);
        $data->save();

        if(isset($request->nama))
        {
            $data->dosen()->sync($request->nama);
        }else{
            $data->dosen()->sync(array());
        }

        //return 'berhasil';
        return redirect()->route('admin.penelitian.view');
    }

    public function deletePenelitian($id)
    {
        $datas = Penelitian::find($id);
        $datas->dosen()->detach();
        $datas->delete();
        return redirect()->route('admin.penelitian.view');
    }

    //Bimbingan Section

    public function viewBimbingan()
    {
        $datas = PembimbingTesis::all();
        return view('pages.penelitian.viewBimbingan')->withDatas($datas);
    }

    public function formBimbingan()
    {
        $dosens = Dosen::all();
        $jabatans = JabatanAkademik::all();
        return view('pages.penelitian.bimbinganInput')->withDosens($dosens)->withJabatans($jabatans);
    }

    public function storeBimbingan(Request $request)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'pendidikan' => 'max:255',
            'jabatan' => 'max:255',
            'jumlahMahasiswaKT' => 'required|max:255',
            'jumlahMahasiswaAG' => 'required|max:255',
        ));

        $data = new PembimbingTesis();
        $data->dosen_id = $request->nama;
        $data->pendidikan_tertinggi = $request->pendidikan;
        $data->jabatan_akademik_id = $request->jabatan;
        $data->pembimbing_sbg_ketua = $request->jumlahMahasiswaKT;
        $data->pembimbing_sbg_anggota= $request->jumlahMahasiswaAG;
        $data->save();

        return  redirect()->route('admin.penelitian.viewBimbingan');
    }

    public function bimbinganFormUpdate($id)
    {
        $dosens = Dosen::all();
        $jabatans = JabatanAkademik::all();
        $datas = PembimbingTesis::find($id);
        return view('pages.penelitian.bimbinganFormUpdate')->withDosens($dosens)->withDatas($datas)->withJabatans($jabatans);
    }

    public function bimbinganUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'pendidikan' => 'max:255',
            'jabatan' => 'max:255',
            'jumlahMahasiswaKT' => 'required|max:255',
            'jumlahMahasiswaAG' => 'required|max:255',
        ));

        $data = PembimbingTesis::find($id);
        $data->dosen_id = $request->nama;
        $data->pendidikan_tertinggi = $request->pendidikan;
        $data->jabatan_akademik_id = $request->jabatan;
        $data->pembimbing_sbg_ketua = $request->jumlahMahasiswaKT;
        $data->pembimbing_sbg_anggota= $request->jumlahMahasiswaAG;
        $data->save();

        return  redirect()->route('admin.penelitian.viewBimbingan');
    }

    public function deleteBimbingan($id)
    {
        $data = PembimbingTesis::find($id);
        $data->delete();
        return redirect()->route('admin.penelitian.viewBimbingan');
    }

    public function penelitianDosenTetap()
    {
        $danas = SumberDana::all();
        $limit = SumberDana::count();
        $time  = new \DateTime('now');
        $newtime  = $time->modify('-0 year' )->format('Y');
        $newtime1 = $time->modify('-1 year')->format('Y');
        $newtime2 = $time->modify('-1 year')->format('Y');
        $i=1;
        $biaya  = array();
        $jumlah = array();

       for ($k = 0;$k < $limit; $k++) {
               $ts  = Penelitian::where('sumber_dana_id','=',$i)->where('tahun_penelitian','=',$newtime)->count();
               $ts1 = Penelitian::where('sumber_dana_id','=',$i)->where('tahun_penelitian','=',$newtime1)->count();
               $ts2 = Penelitian::where('sumber_dana_id','=',$i)->where('tahun_penelitian','=',$newtime2)->count();
               $biaya[$k][0] = $ts;
               $biaya[$k][1] = $ts1;
               $biaya[$k][2] = $ts2;
               $i++;
               $jumlah[$k] = $ts+$ts2+$ts1;
       }
       return view('pages.penelitian.penelitianDosen')->withBiaya($biaya)->withDanas($danas)->withJumlah($jumlah);
    }

    public function jumlahDanaPenelitian()
    {
        $penelitians = Penelitian::all();
        $avg = Penelitian::avg('jumlah_dana');
        return view('pages.penelitian.jumlahDanaPenelitian')->withPenelitians($penelitians)->withAvg($avg);
    }

    public function bimbinganList()
    {
        $bimbingans = PembimbingTesis::all();
        $guru = Dosen::where('jabatan_akademik_id',1)->count();
        $kepala = Dosen::where('jabatan_akademik_id',2)->count();
        $s3 = Dosen::where('gelar_akademik_s3','!=',null)->count();
        return view('pages.penelitian.bimbinganTesisList')->withBimbingans($bimbingans)
                                                                ->withGuru($guru)
                                                                ->withKepala($kepala)
                                                                ->withS3($s3);
    }

    public function penelitianDgnMhs()
    {
        $time = new \DateTime('now');
        $newtime= $time->modify('-0 year' )->format('Y');
        $mahasiswa = PenelitianMahasiswa::where('tahun_penelitian','=',$newtime)->count();
        $datas = Penelitian::all();
        return view('pages.penelitian.listPenelitianDgnMhs')->withDatas($datas)->withMahasiswa($mahasiswa);
    }
}
