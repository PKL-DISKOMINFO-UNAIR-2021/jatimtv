@extends('template_blog/content')
@section('linkcss')
<link rel="stylesheet" href="{{ asset('public/css/viewvid.css') }}">
@endsection
@section('title','video')
@section('nav')
<div class="nav-items">
        <li><a href="{{ route('blog') }}">HOME</a></li>
        <li><a href="/explore">EXPLORE</a></li>
        <li><a href="{{ route('blog.newrelease') }}">NEW RELEASE</a></li>
        <li><a href="/about">ABOUT</a></li>
        <hr>
        <li><a class="fas" href="#"><i class="fas fa-bell mr-3" data-toggle="tooltip" title="notifications"></i></a></li>
        <li ><a class="signin" href="#">SIGN IN</a></li>
      </div>
@endsection
@section('isi')

    <div class="container">
        <div class="row">
		
            <div class="col">
			@foreach($datas ['data2'] as $isi_post)
                <div class="feature-img">
					{!! $isi_post->content !!}
                </div>
				@endforeach
            </div>
		

            <div class="col">
                <h1>Recommendation</h1>
                @foreach($datas ['data'] as $r)
                <div class="small-img-row">
                    <div class="small-img">
                        <img src="{{ $r->gambar }}"/>
                    </div>
                    <a href="{{ route('blog.isi', $r->slug ) }}"><p>{{ $r->judul }}</p></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection