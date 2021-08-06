<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Biodata = Biodata::orderBy('id')->get();
        return response()->json([
            'success' => true,
            'message' => 'Biodata : ',
            'data' => $Biodata
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
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'okupasi' => 'required',
        ]);
    
        $Biodata = Biodata::create([
            'nama'  => $request->nama,
            'ttl'  => $request->ttl,
            'alamat'  => $request->alamat,
            'okupasi'  => $request->okupasi,
    
        ]);
    
        if($Biodata){
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil Ditambahkan',
                'data'      => $Biodata
            ], 200);
            
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Gagal Ditambahkan',
                'data'      => $Biodata
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
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'okupasi' => 'required',
        ]);

        $Biodata = Biodata::find($id)->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'okupasi' => $request->okupasi,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Diubah',
            'data' => $Biodata
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
        $Biodata = Biodata::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Dihapus',
            'data' => $Biodata
        ], 200);
    }
}
