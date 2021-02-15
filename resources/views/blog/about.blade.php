@extends('template_blog.content')
@section('linkcss')
<link rel="stylesheet" href="{{ asset('public/css/about.css') }}">
@endsection
@section('title','about')
@section('nav')
<div class="nav-items">
        <li><a href="{{ route('blog') }}">HOME</a></li>
        <li><a href="/explore">EXPLORE</a></li>
        <li><a href="{{ route('blog.newrelease') }}">NEW RELEASE</a></li>
        <li><a class="active"href="{{ route('blog.about') }}">ABOUT</a></li>
      </div>
@endsection
@section('isi')
    
    <!-- about -->
    
    <section class="about">
 
    @foreach ($about as $ab)
        <div class="container">
            <h3>{!! $ab->title !!}</h3>
            <p> {!! $ab->content !!}</p>
            <hr>
            <div class="alamat">
                <h3>{!! $ab->title_address !!}</h3>
                <p>{!! $ab->content_address !!}</p>
                <hr>
                @endforeach
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.1562243060525!2d112.72702661414924!3d-7.33634617419466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb9723c3ce97%3A0x6292e930823b42c3!2sKOMINFO%20JATIM!5e0!3m2!1sid!2sid!4v1611726660142!5m2!1sid!2sid" 
                    width="100%" height="300" frameborder="0" style="border:0;" 
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
           
        </div>
        
    </section>
        
 @endsection