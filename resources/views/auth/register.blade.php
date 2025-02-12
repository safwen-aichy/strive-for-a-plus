@extends('layout')

@section('title', 'Register')

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Create Your Account</h2>
            <p class="login-subtitle">Join us as a Tutor or Student 🚀</p>
            <form method="POST" action="/register">
                @csrf
                <fieldset>
                    <!-- Name Field -->
                    <div class="input-group">
                        <input type="text" id="name" name="name" placeholder="Full Name" required>
                    </div>

                    <!-- Email Field -->
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Email Address" required>
                    </div>

                    <!-- Password Field -->
                    <div class="input-group">
                        <input type="password" id="password" class='toggle-password-icon' name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword('toggle-password-icon')">
                            <img src="{{asset('images/view.png')}}" alt="Show Password" class='toggle-password-icon'/>
                        </span>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="input-group">
                        <input type="password" class="toggle-password-confirmation-icon" id='password-confirmation' name="password_confirmation" placeholder="Confirm Password" required>
                        <span class="toggle-password" onclick="togglePassword('toggle-password-confirmation-icon')">
                            <img src="{{asset('images/view.png')}}" alt="Show Password" class='toggle-password-confirmation-icon'/>
                        </span>
                    </div>

                    <!-- Role Toggle Switch -->
                    <div class="toggle-container">
                        <span>Student</span>
                        <label class="switch">
                            <input type="checkbox" id="role-switch" name="role" value="tutor" onchange="updateRole()">
                            <span class="slider"></span>
                        </label>
                        <span class='tutor-choice'>Tutor</span>
                    </div>

                    <!-- Hidden Input to Ensure Role is Always Sent -->
                    <input type="hidden" id="role" name="role" value="student">

                    <button type="submit">Register</button>
                </fieldset>

                <p class="signup-link">
                    Already have an account? <a href="/login">Login here</a>
                </p>
            </form>
        </div>
    </div>
@endsection
