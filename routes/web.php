<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'BlogController@index')->name('blog');
Route::get('/newrelease', 'BlogController@index2')->name('blog.newrelease');
Route::get('/abouts', 'BlogController@about')->name('blog.about');
Route::get('/explorepage', 'BlogController@index3')->name('blog.explore');
Route::get('/test', 'PostTagsController@index');
/*Route::get('/isi_post', function(){
	return view('blog.isi_post');
});*/
Route::get('/list-post/{slug}', 'BlogController@isi_blog')->name('blog.isi');
Route::get('/list-explore/{slug}', 'BlogController@isi_blog1')->name('blog.isiexplore');
Route::get('/list-post','BlogController@list_blog')->name('blog.list');
Route::get('/list-category/{category}','BlogController@list_category')->name('blog.category');
Route::get('/cari','BlogController@cari')->name('blog.cari');




Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/category', 'CategoryController');
	Route::resource('/tag', 'TagController');
	Route::resource('/channels', 'ChannelController');

	Route::get('/channels/tampil_hapus', 'ChannelController@tampil_hapus')->name('channels.tampil_hapus');
	Route::get('/channels/restore/{id}', 'ChannelController@restore')->name('channels.restore');
	Route::delete('/channels/kill/{id}', 'ChannelController@kill')->name('channels.kill');

	Route::get('/post/tampil_hapus', 'PostController@tampil_hapus')->name('post.tampil_hapus');
	Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
	Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');
	Route::resource('/post', 'PostController');

	Route::get('/explore/tampil_hapus', 'exploresController@tampil_hapus')->name('explore.tampil_hapus');
	Route::get('/explore/restore/{id}', 'exploresController@restore')->name('explore.restore');
	Route::delete('/explore/kill/{id}', 'exploresController@kill')->name('explore.kill');
	Route::resource('/explore', 'exploresController');

	Route::resource('/user', 'UserController');
	Route::resource('/about', 'AboutsController');
	Route::resource('/carousel', 'CarouselsController');
	Route::resource('/bannernewrelease', 'BannernewreleaseController');
	Route::resource('/bannerexplore', 'BannerexploreController');

});










