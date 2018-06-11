<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SumberDana;
use App\AlokasiDana;

class AlokasiDanaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function alokasiDanaView()
    {
      $time     = new \DateTime('now');
      $years    = array();
      $alokasis = array();
      $years[0] = $time->modify('-0 year' )->format('Y');
      $years[1] = $time->modify('-1 year' )->format('Y');
      $years[2] = $time->modify('-1 year' )->format('Y');
      foreach(SumberDana::all() as $key => $sumberdana)
      {
        $temp = AlokasiDana::where('sumber_dana_id',$sumberdana->id)->get();

        if(count($temp) > 0) {
          $alokasis[$sumberdana->nama_sumber] = array();

          foreach($temp as $alokasi) {
            $alokasis[$sumberdana->nama_sumber][$alokasi->jenis_dana] = array();

            if($temp->where('jenis_dana', $alokasi->jenis_dana)
              ->where('tahun', $years[0])->isNotEmpty()) {
              $alokasis[$sumberdana->nama_sumber][$alokasi->jenis_dana]['ts'] = $temp
                ->where('jenis_dana', $alokasi->jenis_dana)
                ->where('tahun', $years[0])->first()->jumlah;
            }

            if($temp->where('jenis_dana', $alokasi->jenis_dana)
              ->where('tahun', $years[1])->isNotEmpty()) {
              $alokasis[$sumberdana->nama_sumber][$alokasi->jenis_dana]['ts1'] = $temp
                ->where('jenis_dana', $alokasi->jenis_dana)
                ->where('tahun', $years[1])->first()->jumlah;
            }

            if($temp->where('jenis_dana', $alokasi->jenis_dana)
              ->where('tahun', $years[2])->isNotEmpty()) {
              $alokasis[$sumberdana->nama_sumber][$alokasi->jenis_dana]['ts2'] = $temp
                ->where('jenis_dana', $alokasi->jenis_dana)
                ->where('tahun', $years[2])->first()->jumlah;
            }

            $alokasis[$sumberdana->nama_sumber][$alokasi->jenis_dana]['id'] = $alokasi->id;
          }
        }
      }
      // dd($alokasis);
      return view('pages.alokasi_dana.alokasiDanaView')->withAlokasis($alokasis)->withYears($years);
    }

    public function alokasiDanaForm()
    {
      $time = new \DateTime('now');
      $years = array();
      $years[0] = $time->modify('-0 year' )->format('Y');
      $years[1] = $time->modify('-1 year' )->format('Y');
      $years[2] = $time->modify('-1 year' )->format('Y');
      $sumberdanas = SumberDana::all();
      return view('pages.alokasi_dana.alokasiDanaForm')->withSumberdanas($sumberdanas)->withYears($years);
    }

    public function alokasiDanaStore(Request $request)
    {
      $exist = AlokasiDana::where('jenis_dana','=',$request->jenis)->where('tahun',$request->tahun)->exists();
      if($exist){
          return redirect()->route('admin.alokasiDana.view')->with('status', 'Data sudah ada');
      }

      $this->validate($request, array(
          'sumberDana'       => 'required|numeric',
          'tahun'            => 'required|numeric',
          'jenis'            => 'required|max:255',
          'jumlah'           => 'required|numeric',
      ));

      $data                              = new AlokasiDana();
      $data->sumber_dana_id              = $request->sumberDana;
      $data->tahun                       = $request->tahun;
      $data->jenis_dana                  = $request->jenis;
      $data->jumlah                      = $request->jumlah;
      $data->save();

      return redirect()->route('admin.alokasiDana.view')->with('status', 'Data berhasil disimpan');
    }

    public function alokasiDanaFormUpdate($id)
    {
      $time = new \DateTime('now');
      $years = array();
      $years[0] = $time->modify('-0 year' )->format('Y');
      $years[1] = $time->modify('-1 year' )->format('Y');
      $years[2] = $time->modify('-1 year' )->format('Y');
      $alokasi = AlokasiDana::find($id);
      return view('pages.alokasi_dana.alokasiDanaUpdateForm')->withAlokasi($alokasi)->withYears($years);
    }

    public function alokasiDanaUpdate(Request $request,$id)
    {
      $this->validate($request, array(
        'sumberDana'       => 'required|numeric',
        'tahun'            => 'required|numeric',
        'jenis'            => 'required|max:255',
        'jumlah'           => 'required|numeric',
      ));

      $data                              = AlokasiDana::find($id);
      $data->sumber_dana_id              = $request->sumberDana;
      $data->tahun                       = $request->tahun;
      $data->jenis_dana                  = $request->jenis;
      $data->jumlah                      = $request->jumlah;
      $data->save();

      return redirect()->route('admin.alokasiDana.view')->with('status', 'Data berhasil diubah');
    }

      public function alokasiDanaDelete($id)
      {
        $data = AlokasiDana::find($id);
        $data->delete();
        return redirect()->route('admin.alokasiDana.view')->with('status', 'Data berhasil dihapus');
      }
}
