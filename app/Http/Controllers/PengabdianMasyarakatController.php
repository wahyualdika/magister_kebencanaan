<?php

namespace App\Http\Controllers;

use App\PenelitianMahasiswa;
use App\PengabdianMasyarakat;
use App\SumberDana;
use Illuminate\Http\Request;

class PengabdianMasyarakatController extends Controller
{

    public function daftarTampil()
    {
        return view('pages.pengabdian_masyarakat.daftarTampil');
    }

    public function pengabdianView()
    {
        $datas = PengabdianMasyarakat::all();
        $avg   = PengabdianMasyarakat::avg('jumlah');
        $total = PengabdianMasyarakat::sum('jumlah');
        return view('pages.pengabdian_masyarakat.pengabdianMasyarakatView')->withDatas($datas)
                                                                                 ->withAvg($avg)
                                                                                 ->withTotal($total);
    }

    public function pengabdianForm()
    {
        $sdanas = SumberDana::all();
        return view('pages.pengabdian_masyarakat.pengabdianMasyarakatForm')->withSdanas($sdanas);
    }

    public function pengabdianStore(Request $request)
    {
        $this->validate($request,array(
            'judul'      => 'required|max:255',
            'tahun'      => 'required|numeric',
            'jumlahDana' => 'required|numeric',
            'sumberDana' => 'required|max:255',
        ));
        $data = new PengabdianMasyarakat();
        $data->nama = $request->judul;
        $data->tahun = $request->tahun;
        $data->sumber_dana_id = $request->sumberDana;
        $data->jumlah = $request->jumlahDana;
        //dd($data);
        $data->save();

        return redirect()->route('admin.pengabdian.view')->with('status','Data berhasil disimpan');
    }

    public function pengabdianFormUpdate($id)
    {
        $data = PengabdianMasyarakat::find($id);
        return view('pages.pengabdian_masyarakat.pengabdianMasyarakatFormUpdate')->withData($data);
    }

    public function pengabdianUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'judul'      => 'required|max:255',
            'tahun'      => 'required|numeric',
            'jumlahDana' => 'required|numeric',
            'sumberDana' => 'required|max:255',
        ));
        $data = PengabdianMasyarakat::find($id);
        $data->nama = $request->judul;
        $data->tahun = $request->tahun;
        $data->sumber_dana_id = $request->sumberDana;
        $data->jumlah = $request->jumlahDana;
        //dd($data);
        $data->save();

        return redirect()->route('admin.pengabdian.view')->with('status','Data berhasil diubah');
    }

    public function pengabdianDelete($id)
    {
        $data = PengabdianMasyarakat::find($id);
        $data->delete();
        return redirect()->route('admin.pengabdian.view')->with('status','Data berhasil dihapus');
    }

    public function pengabdianListJumlahView()
    {
        $danas = SumberDana::all();
        $time  = new \DateTime('now');
        $newtime  = $time->modify('-0 year' )->format('Y');
        $newtime1 = $time->modify('-1 year')->format('Y');
        $newtime2 = $time->modify('-1 year')->format('Y');
        $i=1;
        $biaya  = array();
        $jumlah = array();

        for ($k = 0;$k<5; $k++) {
            $ts  = PengabdianMasyarakat::where('sumber_dana_id','=',$i)->where('tahun','=',$newtime)->count();
            $ts1 = PengabdianMasyarakat::where('sumber_dana_id','=',$i)->where('tahun','=',$newtime1)->count();
            $ts2 = PengabdianMasyarakat::where('sumber_dana_id','=',$i)->where('tahun','=',$newtime2)->count();
            $biaya[$k][0] = $ts;
            $biaya[$k][1] = $ts1;
            $biaya[$k][2] = $ts2;
            $i++;
            $jumlah[$k] = $ts+$ts2+$ts1;
        }
        return view('pages.pengabdian_masyarakat.listPengabdianMasyarakat')->withBiaya($biaya)->withDanas($danas)->withJumlah($jumlah);
    }
}
