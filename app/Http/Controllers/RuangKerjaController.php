<?php

namespace App\Http\Controllers;

use App\RuangKerja;
use App\RuangTipe;
use Illuminate\Http\Request;

class RuangKerjaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ruangKerjaView()
    {
        $ruangs = RuangKerja::all();
        $total   = RuangKerja::sum('luas');
        return view('pages.ruang_kerja.ruangKerjaView')->withRuangs($ruangs)->withTotal($total);
    }

    public function ruangKerjaForm()
    {
        $rkerjas = RuangTipe::all();
        return view('pages.ruang_kerja.ruangKerjaForm')->withRkerjas($rkerjas);
    }

    public function ruangKerjaStore(Request $request)
    {
        if(RuangKerja::where('ruang_id','=',$request->tipe)->exists()) {
            return redirect()->route('admin.ruangKerja.view')->with('status','Data sudah ada');
        }
        else {

            $this->validate($request, array(
                'tipe' => 'required|numeric',
                'jumlah' => 'required|numeric',
                'luas' => 'required|numeric',
            ));

            $data = new RuangKerja();
            $data->ruang_id = $request->tipe;
            $data->jumlah_ruang = $request->jumlah;
            $data->luas = $request->luas;

            $data->save();

            return redirect()->route('admin.ruangKerja.view')->with('status', 'Data berhasil disimpan');
        }
    }

    public function ruangKerjaFormUpdate($id)
    {
        $rkerja = RuangKerja::find($id);
        return view('pages.ruang_kerja.ruangKerjaFormUpdate')->withRkerja($rkerja);
    }

    public function ruangKerjaUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'tipe'       => 'required|numeric',
            'jumlah'     => 'required|numeric',
            'luas'       => 'required|numeric',
        ));

        $data               = RuangKerja::find($id);
        $data->ruang_id     = $request->tipe;
        $data->jumlah_ruang = $request->jumlah;
        $data->luas         = $request->luas;

        $data->save();

        return redirect()->route('admin.ruangKerja.view')->with('status','Data berhasil diubah');
    }

    public function ruangKerjaDelete($id)
    {
        $data = RuangKerja::find($id);
        $data->delete();
        return redirect()->route('admin.ruangKerja.view')->with('status','Data berhasil dihapus');
    }

}
