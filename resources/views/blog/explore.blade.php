@extends('template_blog.content')
<<<<<<< HEAD
=======
@section('linkcss')

@endsection
>>>>>>> a85699f4e694446da15fc1f5974e3783ae711d4f
@section('title','newrelease')
@section('nav')
<div class="nav-items">
    <li><a href="{{ route('blog') }}">HOME</a></li>
    <li><a class="active"href="{{ route('blog.explore') }}">EXPLORE</a></li>
    <li><a href="{{ route('blog.newrelease') }}">NEW RELEASE</a></li>
    <li><a href="{{ route('blog.about') }}">ABOUT</a></li>
</div>
@endsection
    @section('isi')
    
    <!--Bannerr--> 
    @foreach ($banner as $banner)
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{$banner->gambar}}" alt="First slide">
        </div>
    </div>
    @endforeach
    
    <!--explore content---------------------------->
    <div class="movies-heading">
        <h2>EXPLORE</h2>
    </div>
    <section id="movies-list">
    @foreach ($tags_explore as $ex)
        <!--box-1------------------------>
        <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <a href="{{ route('blog.isiexplore', $ex->slug ) }}"><img src="{{ $ex->gambar }}"/></a>
            </div>
            <!--text--------->
            <a href="{{ route('blog.isi', $ex->slug ) }}">
            {{ $ex->judul }}
            </a>
        </div>
        @endforeach
    </section>
@endsection