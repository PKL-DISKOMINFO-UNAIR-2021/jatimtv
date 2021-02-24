@extends('template_backend.home')

@section('content')
<div class="container">
<div class="main-section">
		@if (Auth::user()->tipe == 1)
		<div class="dashbord">
			<div class="icon-section">
				<i class="fas fa-book-open" aria-hidden="true"></i><br>
				<P>POST</P>
			</div>
			<div class="detail-section">
				<a href="{{ route('post.index') }}">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-green">
			<div class="icon-section">
				<i class="far fa-clipboard" aria-hidden="true"></i><br>
				<p>KATEGORI</p>
			</div>
			<div class="detail-section">
				<a href="{{ route('category.index') }}">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-orange">
			<div class="icon-section">
				<i class="fab fa-youtube" aria-hidden="true"></i><br>
				<p>CHANNEL</p>
			</div>
			<div class="detail-section">
				<a href="{{ route('channels.index') }}">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fas fa-sliders-h" aria-hidden="true"></i><br>
				<p>CAROUSEL</p>
			</div>
			<div class="detail-section">
				<a href="{{ route('carousel.index') }}">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-red">
			<div class="icon-section">
				<i class="far fa-bookmark" aria-hidden="true"></i><br>
				<p>TAG</p>
			</div>
			<div class="detail-section">
				<a href="{{ route('tag.index') }}">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-skyblue">
			<div class="icon-section">
				<i class="fas fa-exclamation-circle" aria-hidden="true"></i><br>
				<p>ABOUT</p>
			</div>
			<div class="detail-section">
				<a href="{{ route('about.index') }}">More Info </a>
			</div>
		</div>
        <div class="dashbord dashbord-orange">
			<div class="icon-section">
				<i class="far fa-user" aria-hidden="true"></i><br>
				<p>USER</p>
			</div>
			<div class="detail-section">
				<a href="{{ route('user.index') }}">More Info </a>
			</div>
		</div>
		@endif
		@if (Auth::user()->tipe == 0)
		<div class="dashbord">
			<div class="icon-section">
				<i class="fas fa-book-open" aria-hidden="true"></i><br>
				<P>POST</P>
			</div>
			<div class="detail-section">
				<a href="{{ route('post.index') }}">More Info </a>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection
