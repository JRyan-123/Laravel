@extends('admin.layouts.layout')
@section('title', 'Edit Attribute')

@section('admin_content')
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Edit Attribute</h5>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.product_attribute.update', $attribute->id) }}" method="POST" >
			@csrf
			@method('PUT')
			<label for="" class="fw-bold mb-2">Category</label>
			<input type="text" class="form-control p-2" placeholder="Enter category..." name="attribute_value" value="{{ $attribute->attribute_value }}">

			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
		</form>
		
	</div>
</div>

@endsection