<?php

namespace App\Http\Controllers;

use App\TenagaAhli;
use Illuminate\Http\Request;

class TenagaAhliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tenagaAhliView()
    {
        $kegiatans = TenagaAhli::all();
        return view('pages.tenaga_ahli.tenagaAhliView')->withKegiatans($kegiatans);
    }

    public function tenagaAhliForm()
    {
        return view('pages.tenaga_ahli.tenagaAhliForm');
    }

    public function tenagaAhliStore(Request $request)
    {
        $this->validate($request,array(
            'nama'      => 'required|max:255',
            'kegiatan'  => 'required|max:255',
            'tahun'     => 'required|numeric',
        ));

        $data = new TenagaAhli();
        $data->nama           = $request->nama;
        $data->tahun          = $request->tahun;
        $data->judul_kegiatan = $request->kegiatan;

        $data->save();

        return redirect()->route('tenagaAhli.kegiatan.view')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function tenagaAhliFormUpdate($id)
    {
        $kegiatan = TenagaAhli::find($id);
        return view('pages.tenaga_ahli.tenagaAhliFormUpdate')->withKegiatan($kegiatan);
    }

    public function tenagaAhliUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'nama'      => 'required|max:255',
            'kegiatan'  => 'required|max:255',
            'tahun'     => 'required|numeric',
        ));

        $data = TenagaAhli::find($id);
        $data->nama           = $request->nama;
        $data->tahun          = $request->tahun;
        $data->judul_kegiatan = $request->kegiatan;

        $data->save();

        return redirect()->route('tenagaAhli.kegiatan.view')->with('status',' Data '.$request->nama.' Berhasil Diubah');
    }

    public function tenagaAhliDelete($id)
    {
        $data = TenagaAhli::find($id);
        $data->delete();
        return redirect()->route('tenagaAhli.kegiatan.view')->with('status','Data Berhasil Dihapus');
    }
}
