<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\explores;
use App\Channel;
use App\Category;
use App\Carousels;
use App\Abouts;

class BlogController extends Controller
{
    public function index(Posts $posts, Channel $channels, explores $explore, Carousels $carousel){
        $category_widget = Category::all();
        $datas = [
            'data' => $posts->oldest()->take(5)->get(),
            'data2' => $posts->latest()->take(7)->get(),
            'data3' => $channels->latest()->take(7)->get(),
            'data4' => $explore->latest()->take(3)->get(),
            'data5' => $carousel->latest()->take(3)->get(),
        ];
    	return view('blog', compact('datas','category_widget'));
    }
    public function index2(Posts $posts){
        $category_widget = Category::all();
        $data = $posts->get();
    	return view('blog.newrelease', compact('data','category_widget'));
    }
    public function index3(explores $explore){
        $category_widget = Category::all();
        $explore= $explore->get();
    	return view('blog.explore', compact('explore','category_widget'));
    }
   
    public function about(){
        $about = Abouts::all();
    	return view('blog.about', compact('about'));
    }

    
    public function isi_blog($slug, Posts $posts){
        $category_widget = Category::all();
        $datas = [
            'data' => $posts->oldest()->take(5)->get(),
            'data2' => Posts::where('slug', $slug)->get(),
        ];
    	return view('blog.isi_post', compact('datas','category_widget'));
    }
    public function isi_blog1($slug, explores $explore){
        $category_widget = Category::all();
        $datas = [
            'data' => $explore->oldest()->take(5)->get(),
            'data2' => explores::where('slug', $slug)->get(),
        ];
    	return view('blog.isi_explore', compact('datas','category_widget'));
    }

    public function list_blog(){
        $category_widget = Category::all();


    	$data = Posts::latest()->paginate(6);
    	return view('blog.list_post', compact('data','category_widget'));
    }

    public function list_category(category $category){
        $category_widget = Category::all();

        $data = $category->posts()->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }

    public function cari(request $request){
        $category_widget = Category::all();

        $data = Posts::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }
}
