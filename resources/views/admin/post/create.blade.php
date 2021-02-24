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
      <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
    
  </div>
  <div class="form-group">
<<<<<<< HEAD
      <label>Kategori</label>
      <select class="form-control" name="category_id" required="required">>
      	<option value="" holder>Pilih Kategori</option>
=======
      <label >Kategori</label>
      <select class="form-control" name="category_id">
      	<option value="" disabled selected >Pilih Kategori</option>
>>>>>>> b13085c306aa20dd1158b408b52011309e2b16d9
      	@foreach($category as $result)
      	<option value="{{ $result->id }}">{{  $result->name }}</option>
      	@endforeach
      </select>
  </div>
  <div class="form-group">
      <label>Pilih Konten</label>
      <select class="form-control" name="tags">
<<<<<<< HEAD
      <option value="" holder>Pilih Konten</option>
=======
      <option value="" disabled selected >Pilih Konten</option>
>>>>>>> b13085c306aa20dd1158b408b52011309e2b16d9
          @foreach($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
          @endforeach
      </select>
  </div>
  <div class="form-group">
      <label>Isi Post</label>
      <textarea class="form-control" name="content" id="content" value="{{ old('content') }}"></textarea>
  </div>
  <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" name="gambar" class="form-control">
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