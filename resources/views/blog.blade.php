
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
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $i = 0;
                foreach ($datas ['data5'] as $caro){
                    $active = '';
                    if($i ==0){
                    $active = 'active';
                }
            ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="<?= $active; ?>"></li>
            <?php $i++; } ?>
        </ol>
        <div class="carousel-inner">
            <?php
                $i = 0;
                    foreach ($datas ['data5'] as $caro){
                        $active = '';
                        if($i ==0){
                        $active = 'active';
                    }
                ?>
            <div class="carousel-item <?= $active; ?>">
                <img class="d-block w-100" src="{{$caro->gambar}}">
                    <div class="carousel-caption d-none d-md-block">
                        <h2> <span class="font-weight-bold">{!!$caro->title!!}</span></h5>
                        <p>{!!$caro->content!!}</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="{{ $caro->link }}" role="button">CHECK OUT</a>
                        </p>
                    </div>
            </div>
            <?php $i++; } ?>
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
<!-- END CAROUSEL -->

<section id="main">
        <!--showcase----------------------->
        <!--heading------------->
        <a class="showcase-heading">NEW RELEASE</a>
        <a class="showcase-heading-kanan" href="{{ route('blog.newrelease') }}" style="float:right;">VIEW ALL</a>

        <ul id="autoWidth" class="cs-hidden">
		@foreach ($datas ['tags_newrelease'] as $nr)
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
			@foreach ($datas ['data3'] as $c)
            <li class="item-a">
			
                <div class="latest-box">
				
                    <!--img-------->
                    <div class="latest-b-img">
                    <a href="{{ $c->url_channel }}"> <img src="{{ $c->gambar }}"></a>
                    </div>
                    <!--text---------->
                    <div class="latest-b-text">
                        <strong>{{ $c->judul }}</strong>
                    </div>
                </div>
            </li>
			@endforeach
    </section>
	
    <!--movies---------------------------->
    <section id="top">
    <a class="latest-heading">EXPLORE</a>
    <a class="showcase-heading-kanan" href="{{ route('blog.explore') }}" style="float:right;">VIEW ALL</a>
    </section>
    
    <section id="movies-list">
        @foreach ($datas ['tags_explore'] as $e)
        <!--box-1------------------------>
        <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">{{ $e->name }}</div>
                <a href="{{ route('blog.isi', $e->slug ) }}"><img src="{{ $e->gambar }}"></a>
            </div>
            <!--text--------->
            <a href="{{ route('blog.isi', $e->slug ) }}">
            {{ $e->judul}}
            </a>
        </div>
        @endforeach
    </section>
    
    <!--PLAYLIST-->
    <!--movies---------------------------->
    <section id="top">
    <a class="latest-heading">PLAYLIST</a>
    <a class="showcase-heading-kanan" href="{{ route('blog.explore') }}" style="float:right;">VIEW ALL</a>
    </section>
    
    <section id="movies-list">
        @foreach ($category_widget as $e)
        <!--box-1------------------------>
        <div class="movies-box">
            <!--img------------>
            <div class="movies-img">
                <div class="quality">{{ $e->name }}</div>
            </div>
            <!--text--------->
            <a href="{{ route('blog.category', $e->slug) }}">
            {{ $e->name}}
            </a>
        </div>
        @endforeach
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