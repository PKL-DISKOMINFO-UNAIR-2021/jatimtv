<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.category.create', compact('category'));
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
            'name' => 'required|min:3',
            'gambar' => 'required',
        ]);
        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'gambar' => 'public/uploads/playlist/'.$new_gambar,
        ]);

        $gambar->move('public/uploads/playlist/', $new_gambar);
        return redirect()->back()->with('success','Ketegori berhasil disimpan');
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
        $category = Category::findorfail($id);
        return view('admin.category.edit', compact('category'));

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
       
        $category = Category::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/playlist/', $new_gambar);

            $category_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'gambar' => 'public/uploads/playlist/'.$new_gambar

        ];
        }
        else{
        $category_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
            ];
        }
        $category->update($category_data);
        return redirect()->route('category.index')->with('success','Data Berhasil di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);
        $category->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
