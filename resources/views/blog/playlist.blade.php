@extends('template_blog.content')
@section('linkcss')

@endsection
@section('title','Playlist')
@section('nav')
<div class="nav-items">
    <li><a href="{{ route('blog') }}">HOME</a></li>
    <li><a href="{{ route('blog.explore') }}">EXPLORE</a></li>
    <li><a href="{{ route('blog.newrelease') }}">NEW RELEASE</a></li>
    <li><a href="{{ route('blog.about') }}">ABOUT</a></li>

</div>
@endsection
    @section('isi')
    
    <!--Bannerr--> 
    
    <!--explore content---------------------------->
    <div class="movies-heading">
        <h2>PLAYLIST</h2>
    </div>
    <section id="movies-list">
    @foreach ($data as $nr)
        <!--box-1------------------------>
        <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <a href="{{ route('blog.isi', $nr->slug ) }}"><img src="../{{ $nr->gambar }}"/></a>
            </div>
            <!--text--------->
            <a href="{{ route('blog.isi', $nr->slug ) }}">
            {{ $nr->judul }}
            </a>
        </div>
        @endforeach
    </section>
@endsection