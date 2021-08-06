<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Resume = Resume::orderBy('id')->get();
        return response()->json([
            'success' => true,
            'message' => 'Resume : ',
            'data' => $Resume
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
            'nama_krj' => 'required',
            'waktu' => 'required',
            'detail' => 'required',
        ]);
    
        $Resume = Resume::create([
            'nama_krj'  => $request->nama_krj,
            'waktu'  => $request->waktu,
            'detail'  => $request->detail,
    
        ]);
    
        if($Resume){
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil Ditambahkan',
                'data'      => $Resume
            ], 200);
            
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Gagal Ditambahkan',
                'data'      => $Resume
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
            'nama_krj' => 'required',
            'waktu' => 'required',
            'detail' => 'required',
        ]);

        $Resume = Resume::find($id)->update([
            'nama_krj' => $request->nama_krj,
            'waktu' => $request->waktu,
            'detail' => $request->detail,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Diubah',
            'data' => $Resume
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
        $Resume = Resume::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Dihapus',
            'data' => $Resume
        ], 200);
    }
    
}
