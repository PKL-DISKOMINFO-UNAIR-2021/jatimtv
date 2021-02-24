@extends('template_backend.home')
@section('sub-judul','Tambah User')
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

  <form action="{{ route('user.store') }}" method="POST">
  @csrf
  <div class="form-group">
      <label>Nama User</label>
      <input type="text" class="form-control" name="name" value="{{ old('name') }}" required="required" Placeholder="Masukkan Nama User">
  </div>

  <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}" required="required" Placeholder="Masukkan Email">
  </div>

  <div class="form-group">
      <label>Tipe User</label>
      <select class="form-control" id="tipe" name="tipe">
      	<option value="" holder>Pilih Tipe User</option>
      	<option value="1" @if (old('tipe') == "1") {{ 'selected' }} @endif>Administrator</option>
      	<option value="0" @if (old('tipe') == "0") {{ 'selected' }} @endif>Operator</option>
      </select>
  </div>

   <div class="form-group">
      <label>Password</label>
      <input type="text" class="form-control" name="password" required="required">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan User</button>
  </div>

  </form>


@endsection