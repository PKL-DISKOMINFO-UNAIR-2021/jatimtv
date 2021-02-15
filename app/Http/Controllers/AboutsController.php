<?php

namespace App\Http\Controllers;

use App\Abouts;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = Abouts::paginate(10);
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Abouts::create([
            'title' => $request->judul,
            'content' => $request->content,
            'title_address' => $request->judul2,
            'content_address' => $request->content2
        ]);

        return redirect()->back()->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = Abouts::findorfail($id);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = Abouts::findorfail($id);
        return view('admin.about.edit', compact('about'));
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
        $about_data = [
            'title' => $request->judul,
            'content' => $request->content,
            'title_address' => $request->judul2,
            'content_address' => $request->content2
        ];

        Abouts::whereId($id)->update($about_data);

        return redirect()->route('about.index')->with('success','Data sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = Abouts::findorfail($id);
        $about->delete();

        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
