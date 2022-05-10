@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Company Info</div>

		<div class="card-body">
			@if($company->getLogo())
				<img class="img-fluid pb-3" src="{{ $company->getLogo() }}" alt="">
			@endif
			<p><span class="fw-bold">Id:</span> {{ $company->id }}</p>
			<p><span class="fw-bold">Name:</span> {{ $company->name }}</p>
			<p><span class="fw-bold">Email:</span> {{ $company->email }}</p>
			<p><span class="fw-bold">Address:</span> {{ $company->address }}</p>
			<p><span class="fw-bold">Created:</span> {{ $company->created_at }}</p>
			<p><span class="fw-bold">Updated:</span> {{ $company->updated_at ?? '---' }}</p>

			<div class="d-flex">
				<a class="btn btn-primary me-3" href="{{ route('companies.edit', $company->id) }}">Edit</a>
				<form method="post" action="{{ route('companies.destroy', $company->id) }}">
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div>
	</div>
@endsection
