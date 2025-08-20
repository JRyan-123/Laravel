@extends('admin.index')
@section('title', 'view/'.$post->user->name)

@section('content')
	<h1>{{ $post->user->name }}</h1>
	<p>Toitle: {{ $post->title }}</p>
	<p>Content: {{ $post->content }}</p>
@endsection