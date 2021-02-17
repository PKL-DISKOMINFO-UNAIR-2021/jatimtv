<?php

namespace App\Http\Controllers;
use App\Bannernewrelease;
use Illuminate\Http\Request;

class BannernewreleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannernewrelease = Bannernewrelease::paginate(10);
        return view('admin.post.Bannernewrelease.index', compact('bannernewrelease'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bannernewrelease = Bannernewrelease::all();
        return view('admin.post.Bannernewrelease.create', compact('bannernewrelease'));
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

        $bannernewrelease = Bannernewrelease::create([
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
        $bannernewrelease = Bannernewrelease::findorfail($id);
        return view('admin.post.Bannernewrelease.edit', compact('bannernewrelease'));
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
        $bannernewrelease = Bannernewrelease::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/Banner/', $new_gambar);

        $bannernewrelease_data = [
            'title' => $request->title,
            'gambar' => 'public/uploads/Banner/'.$new_gambar,
        ];
        }
        else{
        $bannernewrelease_data = [
                'title' => $request->title,
            ];
        }
        $bannernewrelease->update($bannernewrelease_data);

        
        return redirect()->route('bannernewrelease.index')->with('success','Postingan anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bannernewrelease = Bannernewrelease::findorfail($id);
        $bannernewrelease->delete();

        return redirect()->back()->with('success','Carousel Berhasil Dihapus');
    }
}
