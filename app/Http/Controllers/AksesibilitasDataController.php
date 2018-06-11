<?php

namespace App\Http\Controllers;

use App\AksesibilitasData;
use App\JenisData;
use App\SistemPengolahan;
use App\AksesData;
use Illuminate\Http\Request;

class AksesibilitasDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function aksesibilitasDataView()
    {
        $totalmanual   = AksesData::where('sistem_pengolahan_id',1)->count();
        $totalkomputer = AksesData::where('sistem_pengolahan_id',2)->count();
        $totallan      = AksesData::where('sistem_pengolahan_id',3)->count();
        $totalwan      = AksesData::where('sistem_pengolahan_id',4)->count();
        $aksesdatas    = AksesibilitasData::all();
        return view('pages.aksesibilitas_data.aksesibilitasDataView')->withAksesdatas($aksesdatas)
        ->withTotalmanual($totalmanual)
        ->withTotalkomputer($totalkomputer)
        ->withTotallan($totallan)
        ->withTotalwan($totalwan);
    }

    public function aksesibilitasDataForm()
    {
        $jenisdatas = JenisData::all();
        return view('pages.aksesibilitas_data.aksesibilitasDataForm')->withJenisdatas($jenisdatas);
    }

    public function aksesibilitasDataStore(Request $request)
    {
        if(AksesibilitasData::where('jenis_data_id','=',$request->jenis)->exists()) {
            return redirect()->route('admin.aksesibilitasData.view')->with('status','Data sudah ada');
        }
        else {
            $this->validate($request, array(
                'jenis'            => 'numeric',
                'manual'           => 'numeric',
                'komputer'         => 'numeric',
                'lan'              => 'numeric',
                'wan'              => 'numeric',
            ));

            $data                              = new AksesibilitasData();
            $data->jenis_data_id               = $request->jenis;
            $data->save();

            if(isset($request->manual)){
                $data->pengolahan()->sync($request->manual,false);
            }

            if(isset($request->komputer)){
                $data->pengolahan()->sync($request->komputer,false);
            }

            if(isset($request->lan))
            {
                $data->pengolahan()->sync($request->lan,false);
            }

            if(isset($request->wan))
            {
                $data->pengolahan()->sync($request->wan,false);
            }

            return redirect()->route('admin.aksesibilitasData.view')->with('status', 'Data berhasil disimpan');
        }
    }

    public function aksesibilitasDataFormUpdate($id)
    {
        $jenisdatas  = JenisData::all();
        $akses       = AksesibilitasData::find($id);
        $pengolahans = SistemPengolahan::all();
        return view('pages.aksesibilitas_data.aksesibilitasDataFormUpdate')->withAkses($akses)->withPengolahans($pengolahans)
                                                                                 ->withJenisdatas($jenisdatas);
    }

    public function aksesibilitasDataUpdate(Request $request,$id)
    {
        $this->validate($request, array(
            'jenis'            => 'numeric',
            'manual'           => 'numeric',
            'komputer'         => 'numeric',
            'lan'              => 'numeric',
            'wan'              => 'numeric',
        ));

        $data                              = AksesibilitasData::find($id);
        $data->jenis_data_id               = $request->jenis;
        $data->save();

        if(isset($request->pengolahan))
        {
            $data->pengolahan()->sync($request->pengolahan);
        }else{
            $data->pengolahan()->sync(array());
        }

        return redirect()->route('admin.aksesibilitasData.view')->with('status', 'Data berhasil diubah');
    }

    public function aksesibilitasDataDelete($id)
    {
        $data = AksesibilitasData::find($id);
        $data->pengolahan()->detach();
        $data->delete();
        return redirect()->route('admin.aksesibilitasData.view')->with('status', 'Data berhasil dihapus');
    }
}
