@extends('layout')

@section('title', 'Tuition Post Details')

@section('content')
<div class="tuition-details-container">
    <div class="tuition-card">
        @if ($post->photo_path)
            <div class="tuition-image">
                <img src="{{ asset('storage/' . $post->photo_path) }}" alt="Tutor photo">
            </div>
        @endif

        <div class="tuition-info">
            <h1>{{ $post->subject->name }}</h1>
            <p><strong>Fee:</strong> {{ $post->fee }} MYR</p>
            <p><strong>Max Students:</strong> {{ $post->max_students }}</p>
            <p><strong>Category:</strong> {{ $post->category->name }}</p>
            <p><strong>Posted by:</strong> {{ $post->user->name }}</p>
        </div>
    </div>

    <div class="back-btn-container">
        <a href="/" class="back-btn">Back to Listings</a>
    </div>
</div>
@endsection
