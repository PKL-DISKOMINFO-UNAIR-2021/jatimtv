@extends('template_backend.home')
@section('sub-judul','Tambah Banner New Release')
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

  <form action="{{ route ('bannernewrelease.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
      <label>TITTLE</label>
      <input type="text" class="form-control" name="title" value="{{ old('title') }}" required="required" Placeholder="Masukkan Tittle Banner">
  </div>
  
  <div class="form-group">
      <label>IMAGE</label>
      <input type="file" name="gambar" class="form-control" required="required">
  </div>


  <div class="form-group">
      <button class="btn btn-primary btn-block">Tambah Banner</button>
  </div>
  </form>

<script src="{{ asset('public/ckeditor/ckeditor.js')}}"></script>
<script >
  CKEDITOR.replace( 'content' );

</script>

@endsection