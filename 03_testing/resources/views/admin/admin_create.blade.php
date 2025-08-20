@extends('admin.index')
@section('title', 'create')

@section('content')
	<div class="container">
	    <h1>Create New Post</h1>

	    <form action="{{ route('posts.store') }}" method="POST">
	        @csrf

	        <div class="mb-3">
	            <label>Title</label>
	            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
	            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
	        </div>

	        <div class="mb-3">
	            <label>Content</label>
	            <textarea name="content" class="form-control" rows="5">{{ old('content') }}</textarea>
	            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
	        </div>

	        <button class="btn btn-success">Save</button>
	        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
	    </form>
	</div>
@endsection