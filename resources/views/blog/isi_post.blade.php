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
			@foreach($data as $isi_post)
                <div class="feature-img">
					{!! $isi_post->content !!}
                </div>
				@endforeach
            </div>
		

            <div class="col">
                <h1>Recommendation</h1>
                <div class="small-img-row">
                    <div class="small-img">
                        <img src="">
                    </div>
                    <a href="/Recomendation-Item1"><p>1</p></a>
                </div>
                <div class="small-img-row">
                    <div class="small-img">
                        <img src="">
                    </div>
                    <a href="/Recomendation-Item2"><p>2</p></a>
                </div>
                <div class="small-img-row">
                    <div class="small-img">
                        <img src="">
                    </div>
                    <a href="/Recomendation-Item3"> <p>3</p></a>
                </div>
                <div class="small-img-row">
                    <div class="small-img">
                        <img src="">
                    </div>
                    <a href= "/Recomendation-Item4"> <p> 4</p> </a>
                </div>
                <div class="small-img-row">
                    <div class="small-img">
                        <img src="">
                    </div>
                    <a href="/Recomendation-Item5"><p>5</p></a>
                </div>
            </div>
        </div>
    </div>
@endsection