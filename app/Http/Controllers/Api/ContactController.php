<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Contact = Contact::orderBy('id')->get();
        return response()->json([
            'success' => true,
            'message' => 'Kontak : ',
            'data' => $Contact
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
            'jenis_ct' => 'required',
            'alamat_ct' => 'required',
        ]);
    
        $Contact = Contact::create([
            'jenis_ct'  => $request->jenis_ct,
            'alamat_ct'  => $request->alamat_ct,
    
        ]);
    
        if($Contact){
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil Ditambahkan',
                'data'      => $Contact
            ], 200);
            
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Gagal Ditambahkan',
                'data'      => $Contact
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
            'jenis_ct' => 'required',
            'alamat_ct' => 'required',
        ]);

        $Contact = Contact::find($id)->update([
            'jenis_ct' => $request->jenis_ct,
            'alamat_ct' => $request->alamat_ct,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Diubah',
            'data' => $Contact
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
        $Contact = Contact::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Dihapus',
            'data' => $Contact
        ], 200);
    }
    
}
