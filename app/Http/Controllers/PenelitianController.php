<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Penelitian;
use App\SumberDana;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function daftarView()
    {
        return view('pages.publikasi.daftarTampil');
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
        ));
        $data = new Penelitian();
        $data->judul = $request->judul;
        $data->tahun_penelitian = $request->tahunPenelitian;
        $data->sumber_dana_id = $request->sumberDana;
        $data->jumlah_dana = $request->jumlahDana;
        $data->jumlah_mahasiswa = $request->jumlahMahasiswa;
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
        ));
        $data = Penelitian::find($id);
        $data->judul = $request->judul;
        $data->tahun_penelitian = $request->tahunPenelitian;
        $data->sumber_dana_id = $request->sumberDana;
        $data->jumlah_dana = $request->jumlahDana;
        $data->jumlah_mahasiswa = $request->jumlahMahasiswa;
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
        $datas->delete();
        return redirect()->route('admin.penelitian.view');
    }
}
