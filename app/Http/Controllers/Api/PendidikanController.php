<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pendidikan = Pendidikan::orderBy('id')->get();
        return response()->json([
            'success' => true,
            'message' => 'Pendidikan : ',
            'data' => $Pendidikan
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenjang' => 'required',
            'nama_skl' => 'required',
            'tahun_mulai' => 'required',
            'tahun_lulus' => 'required',
        ]);
    
        $Pendidikan = Pendidikan::create([
            'jenjang'  => $request->jenjang,
            'nama_skl'  => $request->nama_skl,
            'tahun_mulai'  => $request->tahun_mulai,
            'tahun_lulus'  => $request->tahun_lulus,
    
        ]);
    
        if($Pendidikan){
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil Ditambahkan',
                'data'      => $Pendidikan
            ], 200);
            
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Gagal Ditambahkan',
                'data'      => $Pendidikan
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenjang' => 'required',
            'nama_skl' => 'required',
            'tahun_mulai' => 'required',
            'tahun_lulus' => 'required',
        ]);

        $Pendidikan = Pendidikan::find($id)->update([
            'jenjang' => $request->jenjang,
            'nama_skl' => $request->nama_skl,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Diubah',
            'data' => $Pendidikan
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pendidikan = Pendidikan::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Dihapus',
            'data' => $Pendidikan
        ], 200);
    }
    
}
