<div>
	@if($company->getLogo())
		<img style="max-width: 300px;" src="{{ $company->getLogo() }}" alt="">
	@endif
	<p><span style="font-weight: 500">Id:</span> {{ $company->id }}</p>
	<p><span style="font-weight: 500">Name:</span> {{ $company->name }}</p>
	<p><span style="font-weight: 500">Email:</span> {{ $company->email }}</p>
	<p><span style="font-weight: 500">Address:</span> {{ $company->address }}</p>
</div>
