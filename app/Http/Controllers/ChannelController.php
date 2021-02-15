<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Category;
use App\Tags;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::paginate(10);
        return view('admin.channels.index', compact('channels'));
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
        return view('admin.channels.create', compact('category','tags'));
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
            'url_channel' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $channels = Channel::create([
            'judul' => $request->judul,
            'url_channel' =>  $request->url_channel,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'users_id' => Auth::id()
        ]);

        $channels->tags()->attach($request->tags);

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
        $category = Category::all();
        $tags = Tags::all();
        $channels = Channel::findorfail($id);
        return view('admin.channels.edit', compact('channels','tags','category'));
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
            'url_channel' => 'required',
         ]);

        

        $channels = Channel::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

        $channels_data = [
            'judul' => $request->judul,
            'url_channel' =>  $request->url_channel,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul)
        ];
        }
        else{
        $channels_data = [
            'judul' => $request->judul,
            'url_channel' =>  $request->url_channel,
            'slug' => Str::slug($request->judul)
        ];
        }
    

        $channels->tags()->sync($request->tags);
        $channels->update($channels_data);

        
        return redirect()->route('channels.index')->with('success','Postingan anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channels = Channel::findorfail($id);
        $channels->delete();

        return redirect()->back()->with('success','Channel Berhasil Dihapus (Silahkan cek trashed post)');
    }

    public function tampil_hapus(){
        $channels = Channel::onlyTrashed()->paginate(10);
        return view('admin.channel.hapus', compact('channels'));
    }

    public function restore($id){
        $channels = Channel::withTrashed()->where('id', $id)->first();
        $channels->restore();

        return redirect()->back()->with('success','Post Berhasil DiRestore (Silahkan cek list post)');
    }

    public function kill($id){
        $channels = Channel::withTrashed()->where('id', $id)->first();
        $channels->forceDelete();

        return redirect()->back()->with('success','Channel Berhasil Dihapus Secara Permanen');
    }
}
