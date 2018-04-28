<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\MahasiswaDanLulusan;
use App\Penelitian;
use App\PenelitianMahasiswa;
use Illuminate\Http\Request;
use Symfony\Component\Translation\MetadataAwareInterface;

class MahasiswaController extends Controller
{
    public function mahasiswaView()
    {
        $datas = Mahasiswa::all();
        return view('pages.mahasiswa.adminMahasiswaView')->withDatas($datas);
    }

    public function mahasiswaForm()
    {
        return view('pages.mahasiswa.adminMahasiswaForm');
    }

    public function mahasiswaStore(Request $request)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'asalS1' => 'required|max:255',
            'instansiKerja' => 'max:255',
        ));

        $data = new Mahasiswa();
        $data->nama = $request->nama;
        $data->asal_s1 = $request->asalS1;
        $data->instansi_kerja_terakhir = $request->instansiKerja;

        $data->save();
        return redirect()->route('admin.mahasiswa.view');
    }

    public function mahasiswaFormUpdate($id)
    {
        $data = Mahasiswa::find($id);
        return view('pages.mahasiswa.adminMahasiswaUpdate')->withData($data);
    }

    public function mahasiswaUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'asalS1' => 'required|max:255',
            'instansiKerja' => 'max:255',
        ));

        $data = Mahasiswa::find($id);
        $data->nama = $request->nama;
        $data->asal_s1 = $request->asalS1;
        $data->instansi_kerja_terakhir = $request->instansiKerja;

        $data->save();
        return redirect()->route('admin.mahasiswa.view');
    }

    public function mahasiswaDelete($id)
    {
        $data = Mahasiswa::find($id);
        $data->penelitian()->delete();
        $data->delete();
        return redirect()->route('admin.mahasiswa.view');
    }

    //Penelitian Mahasiswa Section

    public function mahasiswaPenelitianView()
    {
        $datas = PenelitianMahasiswa::all();
        return view('pages.mahasiswa.penelitianMahasiswaView')->withDatas($datas);
    }

    public function mahasiswaPenelitianForm()
    {
        $mahasiswas = Mahasiswa::all();
        return view('pages.mahasiswa.penelitianMahasiswaForm')->withMahasiswas($mahasiswas);
    }

    public function mahasiswaPenelitianStore(Request $request)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'judulPenelitian' => 'required|max:255',
            'tahunPenelitian' => 'max:255',
        ));

        $data = new PenelitianMahasiswa();
        $data->mahasiswa_id = $request->nama;
        $data->judul_penelitian = $request->judulPenelitian;
        $data->tahun_penelitian = $request->tahunPenelitian;

        $data->save();
        return redirect()->route('mahasiswa.penelitian.view');
    }

    public function mahasiswaPenelitianFormUpdate($id)
    {
        $data = PenelitianMahasiswa::find($id);
        return view('pages.mahasiswa.penelitianMahasiswaUpdate')->withData($data);
    }

    public function mahasiswaPenelitianUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'judulPenelitian' => 'required|max:255',
            'tahunPenelitian' => 'max:255',
        ));


        $data = PenelitianMahasiswa::find($id);
        $data->mahasiswa_id = $request->nama;
        $data->judul_penelitian = $request->judulPenelitian;
        $data->tahun_penelitian = $request->tahunPenelitian;
        //dd($data);
        $data->save();
        return redirect()->route('mahasiswa.penelitian.view');
    }

    public function mahasiswaPenelitianDelete($id)
    {
        $data = PenelitianMahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa.penelitian.view');
    }

    //mahasiswa dan lulusan section

    public function viewAllLulusanMhs()
    {
        $datas = MahasiswaDanLulusan::all();
        return view('pages.mahasiswa.mhsDanLulusanView')->withDatas($datas);
    }

    public function formLulusanMhs()
    {
        $years = array();
        $time = new \DateTime('now');
        $newtime = $time->modify('-0 year' )->format('Y');
        $newtime1= $time->modify('-1 year' )->format('Y');
        $newtime2= $time->modify('-1 year' )->format('Y');
        $newtime3= $time->modify('-1 year' )->format('Y');
        $newtime4= $time->modify('-1 year' )->format('Y');
        $years[0] = $newtime;
        $years[1] = $newtime1;
        $years[2] = $newtime2;
        $years[3] = $newtime3;
        $years[4] = $newtime4;
        return view('pages.mahasiswa.mhsDanLulusanForm')->withYears($years);
    }

    public function storeLulusanMhs(Request $request)
    {
        $this->validate($request,array(
            'tahunAkademik' => 'required|numeric',
            'dayaTampung' => 'required|numeric',
            'ikutSeleksi' => 'required|numeric',
            'lulusSeleksi' => 'required|numeric',
            'bukanTransfer'=>'required|numeric',
            'transfer'=>'required|numeric',
            'totalBknTransfer' => 'required|numeric',
            'totalTransfer' => 'required|numeric',
            'lulusBknTransfer' => 'required|numeric',
            'lulusTransfer' => 'required|numeric',
            'ipkmin' => 'required|numeric',
            'ipkmak' => 'required|numeric',
            'ipkrat' => 'required|numeric',
            'jumlahWNA' => 'required|numeric',
        ));


        $data = new MahasiswaDanLulusan();
        $data->tahun_akademik = $request->tahunAkademik;
        $data->daya_tampung = $request->dayaTampung;
        $data->ikut_seleksi = $request->ikutSeleksi;
        $data->lulus_seleksi = $request->lulusSeleksi;
        $data->mhsbr_bukan_transfer = $request->bukanTransfer;
        $data->mhsbr_transfer = $request->transfer;
        $data->total_mhs_bknTransfer = $request->totalBknTransfer;
        $data->total_mhs_transfer = $request->totalTransfer;
        $data->lulusan_bkn_transfer = $request->lulusBknTransfer;
        $data->lulusan_transfer = $request->lulusTransfer;
        $data->ipk_reg_min = $request->ipkmin;
        $data->ipk_reg_rat = $request->ipkrat;
        $data->ipk_reg_mak = $request->ipkmak;
        $data->jumlah_mahasiswa_wna = $request->jumlahWNA;

        $data->save();
       // return 'berhasil';
        return redirect()->route('mahasiswa.lulusan.view');
    }
}
