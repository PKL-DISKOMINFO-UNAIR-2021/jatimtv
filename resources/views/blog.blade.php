
@extends('template_blog/content')
@section('linkcss')
<link rel="stylesheet" href="{{ asset('public/css/lightslider.css') }}">
@endsection
@section('title','home')
@section('nav')
<div class="nav-items">
        <li><a class="active"href="{{ route('blog') }}">HOME</a></li>
        <li><a href="/explore">EXPLORE</a></li>
        <li><a href="{{ route('blog.newrelease') }}">NEW RELEASE</a></li>
        <li><a href="{{ route('blog.about') }}">ABOUT</a></li>
      </div>
@endsection
@section('isi')
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>

        <div class="carousel-inner">
     
            <div class="carousel-item active">
                <img class="d-block w-100" src="" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2> <span class="font-weight-bold">SELAMAT DATANG DI JATIM TV</span></h5>
                        <p>Streaming Informasi dan Video dari Dinas KOMINFO Prov. JAWA TIMUR</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="/newrelease" role="button">NEW RELEASE</a>
                        </p>
                    </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slide2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2> <span class="font-weight-bold">KUNJUNGI CHANNEL YOUTUBE KAMI</span></h5>
                    <p>Streaming Informasi dan Video dari Youtube KOMINFO Prov. JAWA TIMUR</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="https://www.youtube.com/channel/UCEe1ees-scoEkTQv3he9PJw" role="button">GO TO YOUTUBE</a>
                    </p>
                </div>
            </div>

            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>

<section id="main">
        <!--showcase----------------------->
        <!--heading------------->
        <a class="showcase-heading">NEW RELEASE</a>
        <a class="showcase-heading-kanan" href="{{ route('blog.newrelease') }}" style="float:right;">VIEW ALL</a>

        <ul id="autoWidth" class="cs-hidden">
		@foreach ($datas ['data'] as $nr)
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


    <!--latest-movies---------------------->
    <section id="latest">
        <a class="latest-heading">CHANNEL</a>
	
        <!--slider------------------->
        <ul id="autoWidth2" class="cs-hidden">
            <!--slide-box-1------------------>
			@foreach ($datas ['data2'] as $c)
            <li class="item-a">
			
                <div class="latest-box">
				
                    <!--img-------->
                    <div class="latest-b-img">
                    <a href="{{ route('blog.isi', $c->slug ) }}"> <img src="{{ $c->gambar }}"></a>
                    </div>
                    <!--text---------->
                    <div class="latest-b-text">
                        <strong>{{ $c->judul }}</strong>
                        <p>{{ $c->category->name }}</p>
                    </div>
                </div>
            </li>
			@endforeach
    </section>
	
    <!--movies---------------------------->
    <section id="top">
    <a class="latest-heading">EXPLORE</a>
    <a class="showcase-heading-kanan" href="/explore" style="float:right;">VIEW ALL</a>
    </section>
    
    <section id="movies-list">
        <!--box-1------------------------>
        <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">Live Record</div>
                <img src="">
            </div>
            <!--text--------->
            <a href="/Explore-Item7">
            
            </a>
        </div>
         <!--box-2------------------------>
         <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">Live Record</div>
                <img src=''>
            </div>
            <!--text--------->
            <a href="/Explore-Item8">
            
            </a>
        </div>
         <!--box-3------------------------>
         <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">Live Record</div>
                <img src=''>
            </div>
            <!--text--------->
            <a href="/Explore-Item9">
            
            </a>
        </div>
        
    </section>
    
    <!--PLAYLIST-->
    <section id="top">
    <a class="latest-heading">PLAYLIST</a>
    <a class="showcase-heading-kanan" href="/explore" style="float:right;">VIEW ALL</a>
    </section>
    
    <section id="movies-list">
        <!--box-1------------------------>
        <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">Playlist 6 Video</div>
                <img src="img/playlist1.jpg">
            </div>
            <!--text--------->
            <a href="/relevance">
            RELEVANCE VIDEO
            </a>
        </div>
         <!--box-2------------------------>
         <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">Playlist 6 Video</div>
                <img src= "img/playlist2.jpg">
            </div>
            <!--text--------->
            <a href="/mostrating">
            MOST RATING
            </a>
        </div>
         
        
    </section>
    <script>
        $(document).ready(function() {
        $('#autoWidth,#autoWidth2').lightSlider({
            autoWidth:true,
            loop:true,
            onSliderLoad: function() {
                $('#autoWidth,#autoWidth2').removeClass('cS-hidden');
            } 
        });  
    });
    </script>

@endsection