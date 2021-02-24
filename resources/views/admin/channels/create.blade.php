@extends('template_backend.home')
@section('sub-judul','Tambah Channel')
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

  <form action="{{ route('channels.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" required="required" Placeholder="Masukkan Judul Channel">
  </div>
  <div class="form-group">
      <label>Url - Channel</label>
      <input type="text" class="form-control" name="url_channel" required="required" Placeholder="Masukkan Link Url">

  </div>
  
  <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" name="gambar" class="form-control" required="required" >
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan Post</button>
  </div>

  </form>

<script src="{{ asset('public/ckeditor/ckeditor.js')}}"></script>
<script >
  CKEDITOR.replace( 'content' );

</script>

@endsection