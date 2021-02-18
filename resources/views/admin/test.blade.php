
@extends('template_blog/content')
@section('linkcss')
<link rel="stylesheet" href="{{ asset('public/css/lightslider.css') }}">
@endsection
@section('title','home')
@section('nav')
<div class="nav-items">
        <li><a class="active"href="{{ route('blog') }}">HOME</a></li>
        <li><a href="{{ route('blog.explore') }}">EXPLORE</a></li>
        <li><a href="{{ route('blog.newrelease') }}">NEW RELEASE</a></li>
        <li><a href="{{ route('blog.about') }}">ABOUT</a></li>
      </div>
@endsection
@section('isi')

<section id="main">
        <!--showcase----------------------->
        <!--heading------------->
        <a class="showcase-heading">NEW RELEASE</a>
        <a class="showcase-heading-kanan" href="{{ route('blog.newrelease') }}" style="float:right;">VIEW ALL</a>

        <ul id="autoWidth" class="cs-hidden">
		@foreach ($data ['posts_tags'] as $nr)
       		<!--box-1--------------------------->
        	<li class="item-a">
            	<!--showcase-box------------------->
           		<div class="showcase-box">
               		<a href="{{ route('blog.isi', $nr->slug ) }}"><img src="{{ $nr->gambar }}"/></a>  
           		</div>
            </li>
			@endforeach
          </ul>
    </section>


   
  

@endsection