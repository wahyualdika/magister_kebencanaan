<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Publikasi;
use App\Tingkat;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function daftarView()
    {
        return view('pages.publikasi.daftarTampil');
    }

    public function viewPublikasi()
    {
        $datas = Publikasi::all();
        return view('pages.publikasi.viewPublikasi')->withDatas($datas);
    }

    public function formPublikasi()
    {
        $dosens = Dosen::all();
        $tingkat = Tingkat::all();
        return view('pages.publikasi.formInput')->withDosens($dosens)->withTingkats($tingkat);
    }

    public function storePublikasi(Request $request)
    {
        $this->validate($request,array(
            'judul' => 'required|max:255',
            'tahunPublikasi' => 'required|max:255',
            'tempatPublikasi' => 'required|max:255',
            'lembagaSitasi' => 'required|max:255',
            'tingkat' => 'required|max:255',
        ));
        $data = new Publikasi();
        $data->judul = $request->judul;
        $data->tempat_publikasi = $request->tempatPublikasi;
        $data->tahun = $request->tahunPublikasi;
        $data->lembaga_sitasi = $request->lembagaSitasi;
        $data->tingkat_id = $request->tingkat;
        //dd($data);
        $data->save();

        if(isset($request->nama))
        {
            $data->dosen()->sync($request->nama,false);
        }else{
            $data->dosen()->sync(array());
        }

        return redirect()->route('admin.publikasi.view');
    }

    public function formUpdate($id)
    {
        $tingkats = Tingkat::all();
        $dosen = Dosen::all();
        $datas = Publikasi::find($id);
        return view('pages.publikasi.formUpdate')->withTingkats($tingkats)
                                                       ->withDosens($dosen)
                                                       ->withDatas($datas);
    }

    public function updatePublikasi(Request $request,$id)
    {
        $this->validate($request,array(
            'judul' => 'required|max:255',
            'tahunPublikasi' => 'required|max:255',
            'tempatPublikasi' => 'required|max:255',
            'lembagaSitasi' => 'required|max:255',
            'tingkat' => 'required|max:255',
        ));

        $data = Publikasi::find($id);
        $data->judul = $request->judul;
        $data->tempat_publikasi = $request->tempatPublikasi;
        $data->tahun = $request->tahunPublikasi;
        $data->lembaga_sitasi = $request->lembagaSitasi;
        $data->tingkat_id = $request->tingkat;
        //dd($data);
        $data->save();

        if(isset($request->nama))
        {
            $data->dosen()->sync($request->nama);
        }else{
            $data->dosen()->sync(array());
        }

        return redirect()->route('admin.publikasi.view');
    }

    public function deletePublikasi($id)
    {
        $datas = Publikasi::find($id);
        $datas->dosen()->detach();
        $datas->delete();
        return redirect()->route('admin.publikasi.view');
    }

    public function listPublikasi()
    {
        $publikasis = Publikasi::all();
        $tingkat = array();
        $lokal = Publikasi::where('tingkat_id',1)->count();
        $nasional = Publikasi::where('tingkat_id',2)->count();
        $internasional = Publikasi::where('tingkat_id',3)->count();
        $tingkat[0] = $lokal;
        $tingkat[1] = $nasional;
        $tingkat[2] = $internasional;
        return view('pages.publikasi.listPublikasi')->withPublikasis($publikasis)->withTingkat($tingkat);
    }
}
