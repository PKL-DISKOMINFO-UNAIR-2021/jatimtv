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
use Illuminate\Support\Facades\DB;
use App\Bannerexplore;

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
                    ->select('posts.*','tags.name')
                    ->latest()->take(5)->get();
        $tags_explore = DB::table('posts_tags')
                    ->where('tags_id','=','2')
                    ->join('posts','posts_tags.posts_id','=','posts.id')
                    ->join('tags','posts_tags.tags_id','=','tags.id')
                    ->select('posts.*','tags.name')
                    ->latest()->take(3)->get();
        $playlist1 = DB::table('posts')
                    ->where('category_id','=','1')
                    ->join('category','posts.category_id','=','category.id')
                    ->select('posts.*','category.name')
                    ->get();
        $playlist2 = DB::table('posts')
                    ->where('category_id','=','1')
                    ->join('category','posts.category_id','=','category.id')
                    ->select('posts.*','category.name')
                    ->get();
        $datas = [
            'tags_newrelease'=> $tags_newrelease,
            'tags_explore'=> $tags_explore,
            'playlist1'=>$playlist1,
            'playlist2'=>$playlist2,
            'data3' => $channels->latest()->take(7)->get(),
            'data5' => $carousel->latest()->take(5)->get(),
            'data6' => $bannernewrelease->latest()->take(1)->get(),
        ];
    	return view('blog', compact('datas','category_widget','posts','tags','tags_explore','tags_newrelease','playlist1','playlist2'));
    }

    public function index2(Posts $posts, Bannernewrelease $bannernewrelease){
        $category_widget = Category::all();
        $tags_newrelease = DB::table('posts_tags')
                    ->where('tags_id','=','1')
                    ->join('posts','posts_tags.posts_id','=','posts.id')
                    ->join('tags','posts_tags.tags_id','=','tags.id')
                    ->select('posts.*','tags.name')
                    ->get();
        $data = [
            'tags_newrelease'=> $tags_newrelease,
            'data6' => $bannernewrelease->latest()->take(1)->get(),
        ];
    	return view('blog.newrelease', compact('data','category_widget','tags_newrelease'));
    }
    public function index3(explores $explore, Bannerexplore $bannerexplore){
        $category_widget = Category::all();
        $tags_explore = DB::table('posts_tags')
                    ->where('tags_id','=','2')
                    ->join('posts','posts_tags.posts_id','=','posts.id')
                    ->join('tags','posts_tags.tags_id','=','tags.id')
                    ->select('posts.*','tags.name')
                    ->get();
        $banner = $bannerexplore->latest()->take(1)->get();
        
    	return view('blog.explore', compact('tags_explore','category_widget', 'banner',));
    }
   
    public function list_category(category $category, Bannernewrelease $bannernewrelease){
        $category_widget = Category::all();

        $banner = $bannernewrelease->latest()->take(1)->get();
        $data = $category->posts()->paginate(100);

        return view('blog.playlist', compact('data','category_widget','banner'));
    }

    public function about(){
        $about = Abouts::all();
    	return view('blog.about', compact('about'));
    }

    
    public function isi_blog($slug, Posts $posts, Bannernewrelease $bannernewrelease){
        $category_widget = Category::all();
        $datas = [
            'data' => $posts->take(5)->get(),
            'data2' => Posts::where('slug', $slug)->get(),
            'data6' => $bannernewrelease->latest()->take(1)->get(),
        ];
    	return view('blog.isi_post', compact('datas','category_widget'));
    }

    

    public function cari(request $request){
        $category_widget = Category::all();
        $data = Posts::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }
}
