@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col py-5">
				<div class="d-flex justify-content-between mb-3">
					<h3 class="fw-bold">LISTA PROGETTI</h3>
					<a href="{{ route('admin.projects.create') }}"><button class="btn btn-primary">Aggiungi progetto</button></a>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Content</th>
							<th>Slug</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($projects as $item)
							<tr>
								<td class="px-3">{{ $item['id'] }}</td>
								<td>{{ $item['title'] }}</td>
								<td>{{ $item['content'] }}</td>
								<td>{{ $item['slug'] }}</td>
								<td><a href="{{ route('admin.projects.edit', $item) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
								<td><a href="{{ route('admin.projects.show', $item->slug) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
								<td>
									<form action="{{ route('admin.projects.destroy', ['project' => $item['slug']]) }}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit" value="Cancella" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
									</form>
								</td>
							</tr>
						@empty
						<tr class="bg-transparent border-0">
							<td colspan="7" class="text-center p-0 border-0 bg-transparent">
								<div class="m-0 my-4 d-flex justify-content-center align-items-center">
									<div class="alert alert-warning m-0">Nessun progetto, <a href="{{ route('admin.projects.create') }}">clicca qui</a> per crearne uno</div>
								</div>
							</td>
						</tr>	
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection