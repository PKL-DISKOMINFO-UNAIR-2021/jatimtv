@extends('template_backend.home')
@section('sub-judul','Edit Post')
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

  
@foreach ( $about as $ab)
<form action="{{ route ('about.update', $ab->id) }}" method="POST" enctype="multipart/form-data">

  @csrf
  <div class="form-group">
      <label>TITLE</label>
      <input type="text" class="form-control" name="judul" value="{!! $ab->title !!}">
  </div>
  <div class="form-group">
      <label>CONTENT</label>
      <textarea class="form-control" name="content" id="content">{!! $ab->content !!}</textarea>
  </div>
  <div class="form-group">
      <label>TITLE_ADDRESS</label>
      <input type="text" class="form-control" name="judul2" value="{!! $ab->title_address !!}">
  </div>
  <div class="form-group">
      <label>CONTENT_ADDRESS</label>
      <textarea class="form-control" name="content2" id="content2">{!! $ab->content_address !!}</textarea>
  </div>
  

  <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan Informasi</button>
  </div>

  </form>
  @endforeach
  
<script src="{{ asset('public/ckeditor/ckeditor.js')}}"></script>
<script >
  CKEDITOR.replace( 'content' );
  CKEDITOR.replace( 'content2' );

</script>
@endsection