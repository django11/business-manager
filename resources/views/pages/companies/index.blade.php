@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Companies</div>

		<div class="card-body">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Created At</th>
					<th scope="col">Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach($companies as $company)
				<tr>
					<th scope="row">{{ $company->id }}</th>
					<td>{{ $company->name }}</td>
					<td>{{ $company->email }}</td>
					<td>{{ $company->created_at }}</td>
					<td>
						<a class="btn btn-sm btn-primary" href="{{ route('companies.show', ['company' => $company->id]) }}">
							Preview
						</a>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>

			<div class="mt-5">
				{{ $companies->links() }}
			</div>
		</div>
	</div>
@endsection
