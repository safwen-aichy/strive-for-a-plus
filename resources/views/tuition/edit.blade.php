@extends('layout')

@section('title', 'Edit Tuition Post')

@section('content')
    <div class="edit-tuition-container">
        <h1>Edit Tuition Post</h1>
        <form method="POST" action="/tuition/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="subject">Subject:</label>
            <select name="subject_id" required>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $post->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>

            <label for="fee">Fee:</label>
            <input type="number" step="1" name="fee" value="{{ $post->fee }}" required>

            <label for="max_students">Max Students:</label>
            <input type="number" step="1" name="max_students" value="{{ $post->max_students }}" required>

            <label for="category">Category:</label>
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label for="photo">Photo (optional):</label>
            <input type="file" name="photo">

            <button type="submit">Update</button>
        </form>
    </div>
@endsection
