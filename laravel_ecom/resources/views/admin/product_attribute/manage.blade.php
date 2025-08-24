@extends('admin.layouts.layout')
@section('title', 'Manage Attribute')

@section('admin_content')
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Manage Attribute</h5>
	</div>
	<div class="card-body">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Attribute</th>
		      <th scope="col">Action</th>
		      
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($attributes as $attribute)
			  	 <tr>
			      <th scope="row">{{ $attribute->id }}</th>
			      <td>{{ $attribute->attribute_value }}</td>
			      <td class="d-flex gap-2"><a href="{{ route('admin.product_attribute.show', $attribute->id ) }}" class="btn btn-info btn-sm">View</a>
			      		<form action="{{ route('admin.product_attribute.delete', $attribute->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
						    @csrf
						    @method('DELETE')
						    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
			      </td>
			      
			    </tr>
		  	@endforeach
		   
		   
		  </tbody>
		</table>
				
		</div>
	</div>

@endsection