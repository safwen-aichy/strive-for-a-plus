@extends('layout')

@section('title', 'Account Settings')

@section('content')
<div class="account-container">
    <h2>Account Settings</h2>

    @if(session('success'))
        <div id="notification" class="notification success">
            {{ session('success') }}
        </div>
    @endif

    <form class="account-form" action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="profile-preview">
            @if($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
            @else
                <img src="{{ asset('images/default-avatar.png') }}" alt="Default Profile">
            @endif
        </div>

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" disabled>

        <label for="password">New Password (optional):</label>
        <input type="password" name="password">

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation">

        <!-- Custom File Upload -->
        <label>Profile Picture:</label>
        <div class="file-upload-container">
            <label class="file-upload">
                <i class="fas fa-upload"></i> Upload
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" onchange="updateFileName()">
            </label>
            <span class="file-name" id="file-name">No file selected</span>
        </div>

        <button type="submit" class="update-btn">Update Profile</button>
    </form>
</div>

@endsection
