@extends('template_backend.home')
@section('sub-judul','Tambah Carousel')
@section('content')

  @if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	</div>  		
  	@endforeach
  @endif

  @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
  	
  @endif

  <form action="{{ route ('carousel.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
      <label>TITTLE</label>
      <input type="text" class="form-control" name="title" value="{{ old('title') }}" required="required" Placeholder="Masukkan Tittle Carousel" >
  </div>
  <div class="form-group">
      <label>LINK</label>
      <input type="text" class="form-control" name="link"value="{{ old('link') }}"required="required" Placeholder="Masukkan Link">
  </div>
  <div class="form-group">
      <label>CONTENT</label>
      <textarea class="form-control" name="content" id="content" required="required">{{ old('content') }}</textarea>
  </div>
  <div class="form-group">
      <label>IMAGE</label>
      <input type="file" name="gambar" class="form-control">
  </div>
  

  <div class="form-group">
      <button class="btn btn-primary btn-block">Tambah Carousel</button>
  </div>
  </form>

<script src="{{ asset('public/ckeditor/ckeditor.js')}}"></script>
<script >
  CKEDITOR.replace( 'content' );

</script>

@endsection