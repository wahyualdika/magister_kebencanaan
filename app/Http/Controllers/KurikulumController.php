<?php

namespace App\Http\Controllers;

use App\Kelengkapan;
use App\MataKuliahPilihan;
use App\SksMinimal;
use App\StrukturKurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KurikulumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        if($request->hasFile('fileDeskripsi')){
              $file = $request->file('fileDeskripsi');
              $filename = time().'_deskripsi.'.$file->getClientOriginalExtension();
              $file->move(storage_path('public/kelengkapan/kelengkapan_mk'), $filename);
              $data->deskripsi_path  = 'kelengkapan_mk/'.$filename;
        }

        if ($request->hasFile('fileSilabus')) {
            $file = $request->file('fileSilabus');
            $filename = time().'_silabus.'.$file->getClientOriginalExtension();
            $file->move(storage_path('public/kelengkapan/kelengkapan_mk'), $filename);
            $data->silabus_path  = 'kelengkapan_mk/'.$filename;
        }

        if ($request->hasFile('fileSap')) {
            $file = $request->file('fileSap');
            $filename = time().'_sap.'.$file->getClientOriginalExtension();
            $file->move(storage_path('public/kelengkapan/kelengkapan_mk'), $filename);
            $data->sap_path  = 'kelengkapan_mk/'.$filename;
        }

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


        if($request->hasFile('fileDeskripsi')){
              $file = $request->file('fileDeskripsi');
              $filename = time().'_deskripsi.'.$file->getClientOriginalExtension();
              Storage::disk('public')->delete($data->deskripsi_path);
              $file->move(storage_path('public/kelengkapan/kelengkapan_mk'), $filename);
              $data->deskripsi_path  = 'kelengkapan_mk/'.$filename;
        }

        if ($request->hasFile('fileSilabus')) {
            $file = $request->file('fileSilabus');
            $filename = time().'_silabus.'.$file->getClientOriginalExtension();
            Storage::disk('public')->delete($data->silabus_path);
            $file->move(storage_path('public/kelengkapan/kelengkapan_mk'), $filename);
            $data->silabus_path  = 'kelengkapan_mk/'.$filename;
        }

        if ($request->hasFile('fileSap')) {
            $file = $request->file('fileSap');
            $filename = time().'_sap.'.$file->getClientOriginalExtension();
            Storage::disk('public')->delete($data->sap_path);
            $file->move(storage_path('public/kelengkapan/kelengkapan_mk'), $filename);
            $data->sap_path  = 'kelengkapan_mk/'.$filename;
        }

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

    public function kurikulumDelete($id)
    {
        $kurikulum = StrukturKurikulum::find($id);
        $pilihan = MataKuliahPilihan::where('kode_mk',$kurikulum->kode_mk)->first();
        $kurikulum->kelengkapan()->detach();
        Storage::disk('public')->delete([$kurikulum->deskripsi_path, $kurikulum->silabus_path, $kurikulum->sap_path]);
        $kurikulum->delete();
        $pilihan->delete();
        return redirect()->route('mataKuliah.struktur.view');
    }

    public function kurikulumDownloadKelengkapan($id,$name)
    {
      $file = StrukturKurikulum::find($id);
      $name = strtolower($name);
       if($name == "sap"){
          $file_path = $file->sap_path;
          if($exists = Storage::disk('public')->has($file_path)){
                  return response()->download(storage_path("public/kelengkapan/".$file_path));
          }
       }

      elseif ($name == "deskripsi") {
            $file_path = $file->deskripsi_path;
            if($exists = Storage::disk('public')->has($file_path)){
                return response()->download(storage_path("public/kelengkapan/".$file_path));
          }
      }

      elseif ($name == "silabus") {
          $file_path = $file->silabus_path;
          if($exists = Storage::disk('public')->has($file_path)){
              return response()->download(storage_path("public/kelengkapan/".$file_path));
          }
      }
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
