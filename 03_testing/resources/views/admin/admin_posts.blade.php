@extends('admin.index')
@section('title', 'posts')

@section('content')
<div class="container">
    <h1 class="mb-4">All Posts</h1>
	@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
	@endif


    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ New Post</a>

    @forelse($posts as $post)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                {{-- Post header --}}
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title mb-0">{{ $post->title }}</h5>
                    <small class="text-muted">by {{ $post->user->name }}</small>
                </div>

                {{-- Post content (optional) --}}
                @if($post->content ?? false)
                    <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                @endif

                {{-- Actions --}}
                <div class="d-flex gap-2">
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('posts.destroy', $post ) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this post?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

    @empty
        <p>No posts found.</p>
    @endforelse
    {{ $posts->links('pagination::bootstrap-5') }}
</div>
@endsection