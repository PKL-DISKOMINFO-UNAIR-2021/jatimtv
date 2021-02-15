<?php

namespace App\Http\Controllers;

use App\explores;
use App\Category;
use App\Tags;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class exploresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $explore = explores::paginate(10);
        return view('admin.explore.index', compact('explore'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();
        return view('admin.explore.create', compact('category','tags'));
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
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $explore = explores::create([
            'judul' => $request->judul,
            'category_id' =>  $request->category_id,
            'content' =>  $request->content,
            'gambar' => 'public/uploads/explores/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'users_id' => Auth::id()
        ]);
        $explore->tags()->attach($request->tags);

        $gambar->move('public/uploads/explores/', $new_gambar);
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
        $category = Category::all();
        $tags = Tags::all();
        $explore = explores::findorfail($id);
        return view('admin.explore.edit', compact('explore','tags','category'));
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
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required'            
         ]);

        

        $explore = explores::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/explores/', $new_gambar);

            $explore_data = [
                'judul' => $request->judul,
                'category_id' =>  $request->category_id,
                'content' =>  $request->content,
                'gambar' => 'public/uploads/explores/'.$new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        }
        else{
            $explore_data = [
                'judul' => $request->judul,
                'category_id' =>  $request->category_id,
                'content' =>  $request->content,            
                'slug' => Str::slug($request->judul)
            ];
        }
        $explore->tags()->sync($request->tags);
        $explore->update($explore_data);

        
        return redirect()->route('explore.index')->with('success','Postingan anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $explore = explores::findorfail($id);
        $explore->delete();

        return redirect()->back()->with('success','Post Berhasil Dihapus (Silahkan cek trashed post)');
    }

    public function tampil_hapus(){
        $explore = explores::onlyTrashed()->paginate(10);
        return view('admin.explore.hapus', compact('explore'));
    }

    public function restore($id){
        $explore = explores::withTrashed()->where('id', $id)->first();
        $explore->restore();

        return redirect()->back()->with('success','Post Berhasil DiRestore (Silahkan cek list post)');
    }

    public function kill($id){
        $explore = explores::withTrashed()->where('id', $id)->first();
        $explore->forceDelete();

        return redirect()->back()->with('success','Post Berhasil Dihapus Secara Permanen');
    }
}
