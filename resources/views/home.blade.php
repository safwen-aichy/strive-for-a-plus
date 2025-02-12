@extends('layout')

@section('title', 'Welcome to StriveForA+')

@section('content')

@if(session('success'))
    <div id="notification" class="notification success">
        {{ session('success') }}
    </div>
@endif

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>Excel in Your Studies with StriveForA+</h1>
            <p>Find the best tutors to help you achieve your academic goals.</p>
            <a href="/register" class="btn-primary">Get Started</a>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/hero-image.jpeg') }}" alt="Students Learning">
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="feature-container">
        <h2>Why Choose Us?</h2>
        <div class="features-grid">
            <div class="feature">
                <img src="{{ asset('images/mentor.png') }}" alt="Quality Tutors">
                <h3>Quality Tutors</h3>
                <p>Certified and experienced tutors to ensure you learn from the best.</p>
            </div>
            <div class="feature">
                <img src="{{ asset('images/learning.png') }}" alt="Flexible Learning">
                <h3>Flexible Learning</h3>
                <p>Choose your schedule and learn at your own pace.</p>
            </div>
            <div class="feature">
                <img src="{{ asset('images/affordable.png') }}" alt="Affordable Prices">
                <h3>Affordable Prices</h3>
                <p>High-quality tutoring at the most affordable rates.</p>
            </div>
        </div>
    </div>
</section>

<section class="how-it-works">
    <div class="how-it-works-container">
        <h2>How It Works</h2>
        <div class="steps">
            <div class="step">
                <img src="{{ asset('images/findtutor.png') }}" alt="Find a Tutor">
                <h3>Find a Tutor</h3>
                <p>Search for tutors based on subjects, location, and availability.</p>
            </div>
            <div class="step">
                <img src="{{ asset('images/book-lesson.png') }}" alt="Book a Lesson">
                <h3>Book a Lesson</h3>
                <p>Choose a suitable time and book a lesson with your preferred tutor.</p>
            </div>
            <div class="step">
                <img src="{{ asset('images/start-learning.png') }}" alt="Start Learning">
                <h3>Start Learning</h3>
                <p>Attend your lesson, get expert guidance, and improve your skills.</p>
            </div>
        </div>
    </div>
</section>
@endsection
