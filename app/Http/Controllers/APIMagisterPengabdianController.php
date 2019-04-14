<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenelitianMahasiswa;
use App\PengabdianMasyarakat;
use App\SumberDana;

class APIMagisterPengabdianController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth:api');
      }

      public function index()
      {
          $pengabdian = PengabdianMasyarakat::all();
          if($pengabdian)
          {
              return response()->json([
              'success' => true,
              'data' => $pengabdian
            ]);
          }
      }

      public function show($id)
      {
          $data = PengabdianMasyarakat::find($id);

          if (!$data) {
              return response()->json([
                  'success' => false,
                  'message' => 'Data with id ' . $id . ' not found'
              ], 400);
          }

          return response()->json([
              'success' => true,
              'data' => $data->toArray()
          ], 400);
      }

      public function store(Request $request)
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
        if($data->save())
        {
            return response()->json([
              'success' => true,
              'data' => $data->toArray()
            ]);
        }
        else
        {
          return response()->json([
                'success' => false,
                'message' => 'Data could not be added'
            ], 500);
        }


      }

      public function update(Request $rquest,$id)
      {
        $this->validate($request,array(
            'judul'      => 'required|max:255',
            'tahun'      => 'required|numeric',
            'jumlahDana' => 'required|numeric',
            'sumberDana' => 'required|max:255',
        ));

        $data = PengabdianMasyarakat::find($id);
        if(!data){
          return response()->json([
                'success' => false,
                'message' => 'Data with id ' . $id . ' not found'
            ]);
        }
        $data->nama = $request->judul;
        $data->tahun = $request->tahun;
        $data->sumber_dana_id = $request->sumberDana;
        $data->jumlah = $request->jumlahDana;
        if($data->save())
        {
          return response()->json([
                'success' => true
            ]);
        }
        else{
          return response()->json([
                'success' => false,
                'message' => 'Data could not be updated'
            ], 500);
        }
      }

      public function destroy($id)
      {
          $data = PengabdianMasyarakat::find($id);
          if(!data){
            return response()->json([
                  'success' => false,
                  'message' => 'Data with id ' . $id . ' not found'
              ]);
          }

          if ($data->delete()) {
            return response()->json([
                'success' => true
            ]);
          } else {
            return response()->json([
                'success' => false,
                'message' => 'Data could not be deleted'
            ], 500);
          }
      }
}
