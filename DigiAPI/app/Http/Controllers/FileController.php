<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kitabs;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function upload_kitab(Request $request)
    {
        $this->validate($request, [
            'judul'=> 'required',
            'kategori' => 'required',
			'sampul' => 'required',
			'kitab' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
        $sampul = $request->file('sampul');
        $kitab = $request->file('kitab');
 
      	        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload_sampul = public_path('kitab_file/sampul');
        $tujuan_upload_kitab = public_path('kitab_file');
 
                // upload file
        $kitab->move($tujuan_upload_kitab,$kitab->getClientOriginalName());
        $sampul->move($tujuan_upload_sampul,$sampul->getClientOriginalName());
        
        
        
        $kitabs = new Kitabs;

        $kitabs->kategori = request('kategori');
        $kitabs->judul_kitab = request('judul');
        $kitabs->sampul =$sampul->getClientOriginalName();
        $kitabs->link = $kitab->getClientOriginalName();
        
        $kitabs->save();
        return view('admin/admin_template');
        
    }
    
}
