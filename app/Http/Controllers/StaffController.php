<?php

namespace App\Http\Controllers;

use App\JenisStaff;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function staffView()
    {
        $staffs = Staff::all();
        return view('pages.staff.staffView')->withStaffs($staffs);
    }

    public function staffForm()
    {
        $jenisstaffs = JenisStaff::all();
        return view('pages.staff.staffForm')->withJenisstaffs($jenisstaffs);
    }

    public function staffStore(Request $request)
    {
        $this->validate($request,array(
            'jenisStaff'              => 'required|max:255',
            's3'                      => 'required|numeric',
            's2'                      => 'required|numeric',
            's1'                      => 'required|numeric',
            'd4'                      => 'required|numeric',
            'd3'                      => 'required|numeric',
            'd2'                      => 'required|numeric',
            'd1'                      => 'required|numeric',
            'sma'                     => 'required|numeric',
        ));

        $data = new Staff();
        $data->jenis_staff_id = $request->jenisStaff;
        $data->jumlah_s1      = $request->s1;
        $data->jumlah_s2      = $request->s2;
        $data->jumlah_s3      = $request->s3;
        $data->jumlah_d4      = $request->d4;
        $data->jumlah_d3      = $request->d3;
        $data->jumlah_d2      = $request->d2;
        $data->jumlah_d1      = $request->d1;
        $data->jumlah_sma     = $request->s1;
        $data->unit_kerja     = $request->unitKerja;

        $data->save();

        return redirect()->route('admin.staff.view');
    }

    public function staffFormUpdate($id)
    {
        $staff = Staff::find($id);
        return view('pages.staff.staffFormUpdate')->withStaff($staff);
    }

    public function staffUpdate(Request $request,$id)
    {
        $this->validate($request,array(
            'jenisStaff'              => 'required|max:255',
            's3'                      => 'required|numeric',
            's2'                      => 'required|numeric',
            's1'                      => 'required|numeric',
            'd4'                      => 'required|numeric',
            'd3'                      => 'required|numeric',
            'd2'                      => 'required|numeric',
            'd1'                      => 'required|numeric',
            'sma'                     => 'required|numeric',
        ));

        $data = Staff::find($id);
        $data->jenis_staff_id = $request->jenisStaff;
        $data->jumlah_s1      = $request->s1;
        $data->jumlah_s2      = $request->s2;
        $data->jumlah_s3      = $request->s3;
        $data->jumlah_d4      = $request->d4;
        $data->jumlah_d3      = $request->d3;
        $data->jumlah_d2      = $request->d2;
        $data->jumlah_d1      = $request->d1;
        $data->jumlah_sma     = $request->s1;
        $data->unit_kerja     = $request->unitKerja;

        $data->save();

        return redirect()->route('admin.staff.view');
    }

    public function staffDelete($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->route('admin.staff.view');
    }

}
