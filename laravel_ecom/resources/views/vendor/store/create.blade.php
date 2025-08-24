@extends('vendor.layouts.layout')
@section('title', 'Create Store name')

@section('vendor_content')
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Create Store name</h5>
	</div>
	<div class="card-body">
		<form action="{{ route('vendor.store.dbstore')}}" method="POST" >
			@csrf
			<label for="" class="fw-bold mb-2">Store name</label>
			<input type="text" class="form-control p-2" placeholder="Enter Store name..." name="store_name">

			<label for="" class="fw-bold mb-2">Details</label>
			<textarea name="details" rows="5" class="form-control p-2"></textarea>

			<label for="" class="fw-bold mb-2">Slug</label>
			<input type="text" name="slug" class="form-control p-2">

			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
		</form>
		
	</div>
</div>
@endsection