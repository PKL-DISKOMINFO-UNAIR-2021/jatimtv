@extends('template_backend.home')
@section('sub-judul','Banner Explore')
@section('content')

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif


	<a href="{{ route('bannerexplore.create') }}" class="btn btn-info btn-sm">Tambah Banner</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
			<th>ID</th>
				<th>Title</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($bannerexplore as $ab)
			<tr>
                <td>{!! $ab->id !!}</td>
                <td>{!! $ab->title !!}</td>
                <td><img src="{{ asset( $ab->gambar ) }}" class="img-fluid" style="width:100px"></td>
				<td>
					<form action="{{ route('bannerexplore.destroy', $ab->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('bannerexplore.edit', $ab->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $bannerexplore->links() }}


@endsection