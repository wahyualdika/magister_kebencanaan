<?php

namespace App\Http\Controllers;

use App\JenisPustaka;
use App\Pustaka;
use Illuminate\Http\Request;

class PustakaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function pustakaView()
    {
        $totaljudul = Pustaka::sum('jumlah_judul');
        $totalcopy  = Pustaka::sum('jumlah_copy');
        $pustakas = Pustaka::all();
        return view('pages.pustaka.pustakaView')->withPustakas($pustakas)->withTotaljudul($totaljudul)->withTotalcopy($totalcopy);
    }

    public function pustakaForm()
    {
        $jenispustakas = JenisPustaka::all();
        return view('pages.pustaka.pustakaForm')->withJenispustakas($jenispustakas);
    }

    public function pustakaStore(Request $request)
    {
            if(Pustaka::where('jenis_pustaka_id','=',$request->jenis)->exists()) {
                return redirect()->route('admin.pustaka.view')->with('status','Data sudah ada');
            }
            else {
                $this->validate($request, array(
                    'jenis'              => 'required|numeric',
                    'judul'             => 'required|numeric',
                    'copy'               => 'required|numeric',
                ));

                $data                   = new Pustaka();
                $data->jenis_pustaka_id = $request->jenis;
                $data->jumlah_judul     = $request->judul;
                $data->jumlah_copy      = $request->copy;

                $data->save();

                return redirect()->route('admin.pustaka.view')->with('status', 'Data berhasil disimpan');
            }
    }

    public function pustakaFormUpdate($id)
    {
        $pustaka = Pustaka::find($id);
        return view('pages.pustaka.pustakaFormUpdate')->withPustaka($pustaka);
    }

    public function pustakaUpdate(Request $request,$id)
    {
        $this->validate($request, array(
            'jenis'              => 'required|numeric',
            'judul'              => 'required|numeric',
            'copy'               => 'required|numeric',
        ));

        $data                   = Pustaka::find($id);
        $data->jenis_pustaka_id = $request->jenis;
        $data->jumlah_judul     = $request->judul;
        $data->jumlah_copy      = $request->copy;

        $data->save();

        return redirect()->route('admin.pustaka.view')->with('status', 'Data berhasil diubah');
    }

    public function pustakaDelete($id)
    {
        $data = Pustaka::find($id);
        $data->delete();

        return redirect()->route('admin.pustaka.view')->with('status', 'Data berhasil dihapus');
    }
}
