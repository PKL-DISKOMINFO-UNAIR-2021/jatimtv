@extends('template_blog.content')
@section('linkcss')
<link rel="stylesheet" href="{{ asset('public/css/newrelease.css') }}">
@endsection
@section('title','newrelease')
@section('nav')
<div class="nav-items">
    <li><a href="{{ route('blog') }}">HOME</a></li>
    <li><a href="/explore">EXPLORE</a></li>
    <li><a class="active"href="{{ route('blog.newrelease') }}">NEW RELEASE</a></li>
    <li><a href="{{ route('blog.about') }}">ABOUT</a></li>
</div>
@endsection
    @section('isi')
    
    <!--Bannerr--> 
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('public/img/bannernewrelease.jpg') }}" alt="First slide">
        </div>
    </div>
    
    <!--explore content---------------------------->
    <div class="movies-heading">
        <h2>NEW RELEASE</h2>
    </div>
    <section id="movies-list">
    @foreach ($data as $nr)
        <!--box-1------------------------>
        <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">{{ $nr->category->name }}</div>
                <a href="{{ route('blog.isi', $nr->slug ) }}"><img src="{{ $nr->gambar }}"/></a>
            </div>
            <!--text--------->
            <a href="{{ route('blog.isi', $nr->slug ) }}">
            {{ $nr->judul }}
            </a>
        </div>
        @endforeach
    </section>
@endsection