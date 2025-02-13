@extends('layout')

@section('title', 'Tuitions')

@section('content')
    <h1>All Tuition Postings</h1>

    <div class="filter-container">
        <div class="filter-btn-container">
            <button class="filter-btn" onclick="toggleFilter()" title="Filter">
                <img src="{{ asset('images/filter-icon.png') }}" alt="Filter" class="filter-icon">
            </button>
            <a href='' onclick="toggleFilter(event)">Filter</a>
        </div>

        <form method="GET" action="{{ route('home') }}" class="filter-form">
            <label for="date">Sort by Date:</label>
            <select name="date">
                <option value="">-- Select --</option>
                <option value="asc" {{ request('date') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                <option value="desc" {{ request('date') == 'desc' ? 'selected' : '' }}>Newest First</option>
            </select>

            <label for="tutor">Filter by Tutor:</label>
            <input type="text" name="tutor" value="{{ request('tutor') }}" placeholder="Enter tutor name">

            <label for="category">Filter by Category:</label>
            <select name="category">
                <option value="">-- Select --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label for="subject">Filter by Subject:</label>
            <select name="subject">
                <option value="">-- Select --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
            </select>

            <button type="submit" class="apply-btn">Apply Filters</button>
            <button type="button" class="reset-btn" onclick="window.location.href='{{ route('home') }}'">Reset</button>
        </form>
    </div>

    <div class="posts-container">
        <div class="row">
            @foreach ($tuitionPosts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card tuitions-card">
                        <!-- Image Section -->
                        <div class="tuitions-image">
                            @if($post->photo_path)
                                <img src="{{ asset('storage/' . $post->photo_path) }}" alt="Tuition Image">
                            @else
                                <img src="{{ asset('images/default-tuition.jpg') }}" alt="Default Tuition Image">
                            @endif
                        </div>

                        <!-- Details Section -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->subject->name }}</h5>
                            <h6 class="card-subtitle text-muted">Tutor: {{ $post->user->name }}</h6>
                            <p class="card-text">
                                <strong>Fee:</strong> {{ $post->fee }} MYR <br>
                                <strong>Category:</strong> {{ $post->category->name }} <br>
                                <strong>Max Students:</strong> {{ $post->max_students }}
                            </p>
                            <p class="text-muted small">Date: {{ $post->created_at->format('d M Y') }}</p>
                            <a href="/tuition/{{ $post->id }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="pagination-container">
        {{ $tuitionPosts->links() }}
    </div>
@endsection
