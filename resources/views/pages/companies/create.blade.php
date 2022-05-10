@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Add Company</div>

		<div class="card-body">
			<form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
				@csrf
				<div class="mb-3">
					<label for="name-input" class="form-label">Name</label>
					<input name="name" type="text" class="form-control" id="name-input" value="{{ old('name') }}">
					@error('name')
						<div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="email-input" class="form-label">Email</label>
					<input name="email" type="email" class="form-control" id="email-input" value="{{ old('email') }}">
					@error('email')
						<div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="address-input" class="form-label">Address</label>
					<textarea name="address" class="form-control" id="address-input">{{ old('address') }}</textarea>
					@error('address')
						<div class="text-danger">{{ $message }}</div>
					@enderror
				</div>

				<div class="mb-3">
					<label for="logo-input" class="form-label">Logo</label>
					<input name="logo" type="file" class="form-control" id="logo-input">
					@error('logo')
						<div class="text-danger">{{ $message }}</div>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary mt-4">
					Submit
				</button>
			</form>
		</div>
	</div>
@endsection
