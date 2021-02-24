@extends('template_backend.home')
@section('sub-judul','Tambah About')
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

  <form action="{{ route ('about.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
      <label>TITTLE</label>
      <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" required="required" Placeholder="Masukkan Judul"  >
  </div>
  <div class="form-group">
      <label>CONTENT</label>
      <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>
  </div>
  <div class="form-group">
      <label>TITTLE_ADDRESS</label>
      <input type="text" class="form-control" name="judul2" value="{{ old('judul2') }}"  Placeholder="Masukkan Judul Alamat" >
  </div>
  <div class="form-group">
      <label>CONTENT_ADDRESS</label>
      <textarea class="form-control" name="content2" id="content2">{{ old('content2') }}</textarea>
  </div>
  

  <div class="form-group">
      <button class="btn btn-primary btn-block">Tambah Informasi</button>
  </div>
  </form>

<script src="{{ asset('public/ckeditor/ckeditor.js')}}"></script>
<script >
  CKEDITOR.replace( 'content' );
  CKEDITOR.replace( 'content2' );

</script>

@endsection