@extends('admin.index')
@section('title', 'edit_post')
@section('content')
<div class="container">
    @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5">{{ old('content', $post->content) }}</textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
