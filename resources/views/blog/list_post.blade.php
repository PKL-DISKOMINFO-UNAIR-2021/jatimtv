@extends('template_blog.content')
@section('linkcss')

@endsection
@section('title','Search')
@section('nav')
<div class="nav-items">
    <li><a href="{{ route('blog') }}">HOME</a></li>
    <li><a href="{{ route('blog.explore') }}">EXPLORE</a></li>
    <li><a href="{{ route('blog.newrelease') }}">NEW RELEASE</a></li>
    <li><a href="{{ route('blog.about') }}">ABOUT</a></li>
</div>
@endsection
    @section('isi')
    
    <!--explore content---------------------------->
    <div class="movies-heading">
        <h2>RESULT</h2>
    </div>
    <section id="movies-list">
    @foreach ($data as $s)
        <!--box-1------------------------>
        <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">{{ $s->category->name }}</div>
                <a href="{{ route('blog.isi', $s->slug ) }}"><img src="{{ $s->gambar }}"/></a>
            </div>
            <!--text--------->
            <a href="{{ route('blog.isi', $s->slug ) }}">
            {{ $s->judul }}
            </a>
        </div>
        @endforeach
    </section>
@endsection