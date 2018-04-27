<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
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
        return view('pages.mahasiswa.mhsDanLulusanView');
    }

    public function formLulusanMhs()
    {
        return view('pages.mahasiswa.mhsDanLulusanForm');
    }
}
