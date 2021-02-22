<?php

namespace App\Http\Controllers;
use App\Carousels;
use Illuminate\Http\Request;

class CarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Carousels::paginate(10);
        return view('admin.carousels.index', compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carousel = Carousels::all();
        return view('admin.carousels.create', compact('carousel'));
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
            'content' => 'required',
            'gambar' => 'required',
            'link' => 'required'
        ]);
        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $carousel = Carousels::create([
            'title' => $request->title,
            'content' =>  $request->content,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'link' => $request->link,
        ]);
        $gambar->move('public/uploads/posts/', $new_gambar);
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
        $carousel = Carousels::findorfail($id);
        return view('admin.carousels.edit', compact('carousel'));
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
            'content' => 'required',
            'link' => 'required'
        ]);
        $carousel = Carousels::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $carousel_data = [
            'title' => $request->title,
            'content' =>  $request->content,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'link' => $request->link
        ];
        }
        else{
        $carousel_data = [
                'title' => $request->title,
                'content' =>  $request->content,
                'link' => $request->link
            ];
        }
        $carousel->update($carousel_data);

        
        return redirect()->route('carousel.index')->with('success','Postingan anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousels::findorfail($id);
        $carousel->delete();

        return redirect()->back()->with('success','Carousel Berhasil Dihapus');
    }
}
