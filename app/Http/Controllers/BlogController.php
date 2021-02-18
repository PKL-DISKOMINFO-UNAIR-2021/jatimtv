<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\explores;
use App\Channel;
use App\Category;
use App\Carousels;
use App\Abouts;
use App\Bannernewrelease;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
use App\Bannerexplore;

>>>>>>> cbbe42245c49cca395215926aec47edf063ccc86
class BlogController extends Controller
{
    public function index(Posts $posts, Channel $channels, explores $explore, Carousels $carousel, Bannernewrelease $bannernewrelease){
        $category_widget = Category::all();
        $posts = DB::table('posts')->get();
        $tags = DB::table('tags')->get();
        $tags_newrelease = DB::table('posts_tags')
                    ->where('tags_id','=','1')
                    ->join('posts','posts_tags.posts_id','=','posts.id')
                    ->join('tags','posts_tags.tags_id','=','tags.id')
                    ->select('posts.judul','posts.category_id','posts.content','posts.gambar','posts.slug','tags.name')
                    ->get();
        $tags_explore = DB::table('posts_tags')
                    ->where('tags_id','=','2')
                    ->join('posts','posts_tags.posts_id','=','posts.id')
                    ->join('tags','posts_tags.tags_id','=','tags.id')
                    ->select('posts.judul','posts.category_id','posts.content','posts.gambar','posts.slug','tags.name')
                    ->get();
        $playlist1 = DB::table('posts')
                    ->where('category_id','=','1')
                    ->join('category','posts.category_id','=','category.id')
                    ->select('posts.judul','posts.gambar','category.name','posts.slug','posts.content')
                    ->get();
        $playlist2 = DB::table('posts')
                    ->where('category_id','=','2')
                    ->join('category','posts.category_id','=','category.id')
                    ->select('posts.judul','posts.gambar','category.name','posts.slug','posts.content')
                    ->get();
        $datas = [
            'playlist1'=>$playlist1,
            'playlist2'=>$playlist2,
            'tags_newrelease'=> $tags_newrelease,
            'tags_explore'=> $tags_explore,
            'data3' => $channels->latest()->take(7)->get(),
            'data4' => $explore->latest()->take(3)->get(),
            'data5' => $carousel->latest()->take(5)->get(),
            'data6' => $bannernewrelease->latest()->take(1)->get(),
        ];
    	return view('blog', compact('datas','category_widget'));
    }
    public function index2(Posts $posts, Bannernewrelease $bannernewrelease){
        $category_widget = Category::all();
        $data = [
            'data1' => $posts->get(),
            'data6' => $bannernewrelease->latest()->take(1)->get(),
        ];
    	return view('blog.newrelease', compact('data','category_widget','bannernewrelease'));
    }
    public function index3(explores $explore, Bannerexplore $bannerexplore){
        $category_widget = Category::all();
        $explore = $explore->get();
        $banner = $bannerexplore->latest()->take(1)->get();
        
    	return view('blog.explore', compact('explore','category_widget', 'banner',));
    }
   
    public function about(){
        $about = Abouts::all();
    	return view('blog.about', compact('about'));
    }

    
    public function isi_blog($slug, Posts $posts, Bannernewrelease $bannernewrelease){
        $category_widget = Category::all();
        $datas = [
            'data' => $posts->oldest()->take(5)->get(),
            'data2' => Posts::where('slug', $slug)->get(),
            'data6' => $bannernewrelease->latest()->take(1)->get(),
        ];
    	return view('blog.isi_post', compact('datas','category_widget'));
    }
    public function isi_blog1($slug, explores $explore, Bannerexplore $bannerexplore){
        $category_widget = Category::all();
        $datas = [
            'data' => $explore->oldest()->take(5)->get(),
            'data2' => explores::where('slug', $slug)->get(),
            'data3' => $bannerexplore->latest()->take(1)->get(),
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

        $data = $category->explores()->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }

    public function cari(request $request){
        $category_widget = Category::all();

        $data = Posts::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }
}
