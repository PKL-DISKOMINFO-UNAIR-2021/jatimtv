@extends('template_backend.home')
@section('sub-judul','Carousel')
@section('content')

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif


	<a href="{{ route('carousel.create') }}" class="btn btn-info btn-sm">Tambah Carousel</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
			<th>ID</th>
				<th>Title</th>
				<th>Content</th>
				<th>Image</th>
				<th>Link</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($carousel as $ab)
			<tr>
                <td>{!! $ab->id !!}</td>
                <td>{!! $ab->title !!}</td>
                <td>{!! $ab->content !!}</td>
                <td><img src="{{ asset( $ab->gambar ) }}" class="img-fluid" style="width:100px"></td>
                <td>{!! $ab->link !!}</td>
				<td>
					<form action="{{ route('carousel.destroy', $ab->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('carousel.edit', $ab->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $carousel->links() }}


@endsection