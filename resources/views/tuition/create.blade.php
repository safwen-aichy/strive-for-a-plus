@extends('layout')

@section('title', 'Create Tuition Post')

@section('content')
    <div class="create-tuition-container">
        <h1>Create Tuition Post</h1>
        <form method="POST" action="{{ route('tuition.store') }}" enctype="multipart/form-data">
            @csrf

            <label for="subject">Select Subject:</label>
            <select name="subject_id" required>
                <option value="">-- Choose Subject --</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>

            <label for="fee">Tuition Fee (MYR):</label>
            <input type="number" min='1' name="fee" required>

            <label for="max_students">Max Students:</label>
            <input type="number" min='1' name="max_students" required>

            <label for="category">Category:</label>
            <select name="category_id" required>
                <option value="">-- Choose Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="photo">Upload a Photo (Optional):</label>
            <input type="file" name="photo">

            <button type="submit">Post Tuition</button>
        </form>
    </div>
@endsection
