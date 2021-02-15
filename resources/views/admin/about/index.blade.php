@extends('template_backend.home')
@section('sub-judul','About')
@section('content')

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif


	<a href="{{ route('about.create') }}" class="btn btn-info btn-sm">Tambah Halaman About</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
			<th>ID</th>
				<th>Title</th>
				<th>Content</th>
				<th>Title_Address</th>
				<th>Content_Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($about as $ab)
			<tr>
                <td>{!! $ab->id !!}</td>
                <td>{!! $ab->title !!}</td>
                <td>{!! $ab->content !!}</td>
                <td>{!! $ab->title_address !!}</td>
                <td>{!! $ab->content_address !!}</td>
				<td>
					<form action="{{ route('about.destroy', $ab->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('about.edit', $ab->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $about->links() }}


@endsection