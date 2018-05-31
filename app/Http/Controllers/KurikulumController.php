<?php

namespace App\Http\Controllers;

use App\Kelengkapan;
use App\MataKuliahPilihan;
use App\SksMinimal;
use App\StrukturKurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function daftarTampil()
    {
        return view('pages.kurikulum.daftarTampil');
    }

    public function kurikulumView()
    {
        $kurikulums = StrukturKurikulum::all();
        return view('pages.kurikulum.adminKurikulumView')->withKurikulums($kurikulums);
    }

    public function kurikulumForm()
    {
        return view('pages.kurikulum.adminKurikulumForm');
    }

    public function storeKurikulum(Request $request)
    {
        //dd($request);
        $this->validate($request,array(
            'nama'          => 'required|max:255',
            'semester'      => 'required|numeric',
            'kode'          => 'required|max:255',
            'bobotSKS'      => 'required|numeric',
            'bobotTugas'    => 'required|numeric',
            'penyelenggara' => 'required|max:255',
            'inti'          => 'required|numeric',
            'institusional' => 'required|numeric',

        ));
        $data                     = new StrukturKurikulum();
        $data->nama_mk            = $request->nama;
        $data->semester           = $request->semester;
        $data->kode_mk            = $request->kode;
        $data->bobot_sks          = $request->bobotSKS;
        $data->inti               = $request->inti;
        $data->institusional      = $request->institusional;
        $data->bobot_tugas        = $request->bobotTugas;
        $data->unit_penyelenggara = $request->penyelenggara;
        $data->isPilihan          = $request->pilihan;

        $data->save();

        if(isset($request->silabus)){
            $data->kelengkapan()->sync($request->silabus,false);
        }

        if(isset($request->sap)){
            $data->kelengkapan()->sync($request->sap,false);
        }

        if(isset($request->deskripsi))
        {
            $data->kelengkapan()->sync($request->deskripsi,false);
        }

        return redirect()->route('mataKuliah.struktur.view');
    }

    public function kurikulumFormUpdate($id)
    {
        $kurikulum = StrukturKurikulum::find($id);
        $kelenkapans = Kelengkapan::all();
        return view('pages.kurikulum.adminKurikulumUpdate')->withKurikulum($kurikulum)->withKelengkapans($kelenkapans);
    }

    public function kurikulumUpdate(Request $request,$id)
    {
        //dd($request);
        $this->validate($request,array(
            'nama'          => 'required|max:255',
            'semester'      => 'required|numeric',
            'kode'          => 'required|max:255',
            'bobotSKS'      => 'required|numeric',
            'bobotTugas'    => 'required|numeric',
            'penyelenggara' => 'required|max:255',
            'inti'          => 'required|numeric',
            'institusional' => 'required|numeric',

        ));
        $data                     = StrukturKurikulum::find($id);
        $data->nama_mk            = $request->nama;
        $data->semester           = $request->semester;
        $data->kode_mk            = $request->kode;
        $data->bobot_sks          = $request->bobotSKS;
        $data->inti               = $request->inti;
        $data->institusional      = $request->institusional;
        $data->bobot_tugas        = $request->bobotTugas;
        $data->unit_penyelenggara = $request->penyelenggara;
        $data->isPilihan          = $request->pilihan;
        $data->save();

        if(isset($request->kelengkapan))
        {
            $data->kelengkapan()->sync($request->kelengkapan);
        }else{
            $data->kelengkapan()->sync(array());
        }

        //return "berhasil";
        return redirect()->route('mataKuliah.struktur.view');
    }

    public function kurikulumDelete($id)
    {
        $kurikulum = StrukturKurikulum::find($id);
        $kurikulum->kelengkapan()->detach();
        $kurikulum->delete();
        return redirect()->route('mataKuliah.struktur.view');
    }

    //MATA KULIAH PILIHAN SECTION

    public function getAjaxMk(Request $request)
    {
        $data = StrukturKurikulum::where('kode_mk','=',$request->kode)->first();
        return response()->json($data);
    }

    public function mkPilihanView()
    {
        $mkpilihans = MataKuliahPilihan::all();
        return view('pages.kurikulum.adminMkPilihanView')->withMkpilihans($mkpilihans);
    }

    public function mkPilihanForm()
    {
        $matakuliahs = StrukturKurikulum::where('isPilihan','=',1)->get();
        return view('pages.kurikulum.adminMkPilihanForm')->withMatakuliahs($matakuliahs);
    }

    public function storeMkPilihan(Request $request)
    {
        $this->validate($request, array(
            'nama'          => 'required|max:255',
            'semester'      => 'required|numeric',
            'kode'          => 'required|max:255',
            'bobotSKS'      => 'required|numeric',
            'penyelenggara' => 'required|max:255',
        ));
        $data                     = new MataKuliahPilihan();
        $data->nama_mk            = $request->nama;
        $data->semester           = $request->semester;
        $data->kode_mk            = $request->kode;
        $data->bobot_sks          = $request->bobotSKS;
        $data->unit_penyelenggara = $request->penyelenggara;

        $data->save();

        return redirect()->route('mataKuliah.pilihan.view');
    }

    public function mkPilihanFormUpdate($id)
    {
        $mkpilihan = MataKuliahPilihan::find($id);
        return view('pages.kurikulum.adminMkPilihanFormUpdate')->withMkpilihan($mkpilihan);
    }

    public function updateAjaxMk(Request $request)
    {
        $data = MataKuliahPilihan::where('kode_mk','=',$request->kode)->first();
        return response()->json($data);
    }

    public function mkPilihanUpdate(Request $request,$id)
    {
        $this->validate($request, array(
            'nama'          => 'required|max:255',
            'semester'      => 'required|numeric',
            'kode'          => 'required|max:255',
            'bobotSKS'      => 'required|numeric',
            'penyelenggara' => 'required|max:255',
        ));
        $data                     = MataKuliahPilihan::find($id);
        $data->nama_mk            = $request->nama;
        $data->semester           = $request->semester;
        $data->kode_mk            = $request->kode;
        $data->bobot_sks          = $request->bobotSKS;
        $data->unit_penyelenggara = $request->penyelenggara;

        $data->save();

        return redirect()->route('mataKuliah.pilihan.view');
    }

    public function mkPilihanDelete($id)
    {
        $data = MataKuliahPilihan::find($id);
        $data->delete();
        return redirect()->route('mataKuliah.pilihan.view');
    }

    //SKS MINIMAL MATA KULIAH

    public function sksMinimalView()
    {
        $sksmins = SksMinimal::all();
        return view('pages.kurikulum.adminSKSMinimumView')->withSksmins($sksmins);
    }

    public function sksMinimalForm()
    {
        return view('pages.kurikulum.adminSKSMinimumForm');
    }

    public function storeSKSMinimal(Request $request)
    {
        $existPilihan = SksMinimal::where('jenis_mk','=','Pilihan')->exists();
        $existWajib = SksMinimal::where('jenis_mk','=','Wajib')->exists();
        if($request->jenisMK == 'Pilihan' && $existPilihan ){
            return redirect()->route('mataKuliah.sksMinimal.view')->with('status', 'Jenis MK sudah ada!');
        }
        elseif($request->jenisMK == 'Wajib' && $existWajib){
            return redirect()->route('mataKuliah.sksMinimal.view')->with('status', 'Jenis MK sudah ada!');
        }
        else {
            $this->validate($request, array(
                'jenisMK' => 'required|max:255',
                'sks' => 'required|numeric',
                'keterangan' => 'required|max:255',
            ));
            $data = new SksMinimal();
            $data->jenis_mk = $request->jenisMK;
            $data->sks = $request->sks;
            $data->keterangan = $request->keterangan;

            $data->save();

            return redirect()->route('mataKuliah.sksMinimal.view');
        }
    }

    public function sksMinimalFormUpdate($id)
    {
        $sksmin = SksMinimal::find($id);
        return view('pages.kurikulum.adminSKSMinimumUpdate')->withSksmin($sksmin);
    }

    public function sksMinimalUpdate(Request $request,$id)
    {
        $this->validate($request, array(
            'jenisMK'      => 'required|max:255',
            'sks'          => 'required|numeric',
            'keterangan'   => 'required|max:255',
        ));
        $data               = SksMinimal::find($id);
        $data->jenis_mk     = $request->jenisMK;
        $data->sks          = $request->sks;
        $data->keterangan   = $request->keterangan;

        $data->save();

        return redirect()->route('mataKuliah.sksMinimal.view');
    }

    public function sksMinimalDelete($id)
    {
        $data = SksMinimal::find($id);
        $data->delete();
        return redirect()->route('mataKuliah.sksMinimal.view');
    }
}
