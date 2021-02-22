<?php

namespace App\Http\Controllers;
use App\Bannerexplore;
use Illuminate\Http\Request;

class BannerexploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerexplore = Bannerexplore::paginate(10);
        return view('admin.explore.Bannerexplore.index', compact('bannerexplore'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bannerexplore = Bannerexplore::all();
        return view('admin.explore.Bannerexplore.create', compact('bannerexplore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'gambar' => 'required',
        ]);
        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $bannerexplore = Bannerexplore::create([
            'title' => $request->title,
            'gambar' => 'public/uploads/Banner/'.$new_gambar,
        ]);
        $gambar->move('public/uploads/Banner/', $new_gambar);
        return redirect()->back()->with('success','Postingan anda berhasil disimpan');
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
        $bannerexplore = Bannerexplore::findorfail($id);
        return view('admin.explore.Bannerexplore.edit', compact('bannerexplore'));

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
        $this->validate($request, [
            'title' => 'required',
        ]);
        $bannerexplore = Bannerexplore::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/Banner/', $new_gambar);

        $bannerexplore_data = [
            'title' => $request->title,
            'gambar' => 'public/uploads/Banner/'.$new_gambar,
        ];
        }
        else{
        $bannerexplore_data = [
                'title' => $request->title,
            ];
        }
        $bannerexplore->update($bannerexplore_data);

        
        return redirect()->route('bannerexplore.index')->with('success','Postingan anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bannerexplore = Bannerexplore::findorfail($id);
        $bannerexplore->delete();

        return redirect()->back()->with('success','Banner Berhasil Dihapus');
    }
}
