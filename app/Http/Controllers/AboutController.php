<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AboutController extends Controller
{
    public function index()
    {
    
    	$about = DB::table('about')->get();
 
    
    	return view('admin.about.index',['about' => $about]);
 
    }

public function tambah()
{
 
	// memanggil view tambah
	return view('admin.about.create');
 
}
    public function store(Request $request)
{
	// insert data ke table pegawai
	DB::table('about')->insert([
		'title' => $request->judul,
		'content' => $request->content,
		'title_address' => $request->judul2,
		'content_address' => $request->content2
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/admin/about');
 
}
public function edit($id)
    {
        $about = DB::table('about')->where('id',$id)->get();
	// passing data pasien yang didapat ke view edit.blade.php
	return view('admin.about.edit',['about'=> $about]);
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
        DB::table('about')->where('id',$request->id)->update([
            'title' => $request->judul,
            'content' => $request->content,
            'title_address' => $request->judul2,
            'content_address' => $request->content2
        ]);

	        return redirect('admin/about')->with('sukses','Data Berhasil Diupdate');
    
    }
    public function hapus($id)
{

	DB::table('about')->where('id',$id)->delete();
		

	return redirect('/admin/about');
}
}
