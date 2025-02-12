@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-container">
        <h1>Welcome, {{ $posts[0]->user->name }}</h1>

        <!-- Create New Tuition Listing Button -->
        <div class="action-buttons">
            <a href="/tuition-create" class="btn btn-primary">+ Create New Tuition Listing</a>
        </div>

        <!-- Tuition Listings Collapsible Section -->
        <div class="tuition-listings"> 
            <div class="listings-container">
                <div class="grid-container">
                    @foreach ($posts as $post)
                        <div class="tuition-card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->subject->name }}</h5>
                                <br>
                                <p class="card-text"><strong>Price: </strong>{{ $post->fee }} MYR</p>
                                <p class="card-text"><strong>Max Students: </strong>{{ $post->max_students }}</p>
                                <p class="card-text"><strong>Category: </strong>{{ $post->category->name }}</p>
                                <a href="/tuition/{{ $post->id }}/edit" class="btn btn-secondary">Edit</a>
                                <form method="POST" action="/tuition/{{ $post->id }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- Pagination -->
        <div class="pagination-container">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
