 @extends('vendor.layouts.layout')
@section('title', 'Store Manage')

@section('vendor_content')
	

<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Manage Category</h5>
	</div>
	<div class="card-body">
		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  	@foreach( $stores as $store )
	  	 <tr>
	      <th scope="row">{{ $store->id }}</th>
	      <td>{{ $store->store_name }}</td>
	      <td class="d-flex gap-2"><a href="{{ route('vendor.store.show', $store->id ) }}" class="btn btn-info btn-sm">View</a>
	      		<form action="{{ route('vendor.store.delete', $store->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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