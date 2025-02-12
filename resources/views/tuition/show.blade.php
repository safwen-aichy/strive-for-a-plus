@extends('layout')

@section('title', 'Tuition Post Details')

@section('content')
    <h1>{{ $post->subject->name }}</h1>
    <p><strong>Fee:</strong> {{ $post->fee }} MYR</p>
    <p><strong>Max Students:</strong> {{ $post->max_students }}</p>
    <p><strong>Category:</strong> {{ $post->category->name }}</p>
    @if ($post->photo_path)
        <p><strong>Photo:</strong></p>
        <img src="{{ asset('storage/' . $post->photo_path) }}" alt="Tutor photo" width="200">
    @endif
    <p><strong>Posted by:</strong> {{ $post->user->name }}</p>
    <a href="/">Back to Listings</a>
@endsection