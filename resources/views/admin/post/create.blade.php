@extends('template_backend.home')
@section('sub-judul','Tambah Post')
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

  <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" required="required"value="{{ old('judul') }}" placeholder="Masukkan Judul">
    
  </div>
  <div class="form-group">
      <label>Kategori</label>
      <select class="form-control" name="category_id" required="required" >
      	<option value="" holder>Pilih Kategori</option>
      	@foreach($category as $result)
          @if (old('category_id') == $result->id)
      	<option value="{{ $result->id }}" selected>{{  $result->name }}</option>
          @else
          <option value="{{ $result->id }}" >{{  $result->name }}</option>
          @endif
      	@endforeach
      </select>
  </div>
  <div class="form-group">
      <label>Pilih Konten</label>
      <select class="form-control" name="tags">
      <option value="" holder>Pilih Konten</option>
          @foreach($tags as $tag)
          @if (old('tags') == $tag->id)
            <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option> 
          @else
            <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
          @endif
          @endforeach
      </select>
  </div>
  <div class="form-group">
      <label>Isi Post</label>
      <textarea class="form-control" name="content" id="content" value="{{ old('content') }}"></textarea>
  </div>
  <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" name="gambar" class="form-control" >
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