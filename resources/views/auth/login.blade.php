@extends('layout')

@section('title', 'Login')

@section('content')

@if(session('success'))
    <div id="notification" class="notification success">
        {{ session('success') }}
    </div>
@endif

    <div class="login-container">
        <div class="login-box">
            <h2>Welcome Back!</h2>
            <p class="login-subtitle">Login to continue your journey 🚀</p>
            <form method="POST" action="/login">
                @csrf
                <fieldset>
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Email Address" required>
                    </div>

                    <div class="input-group">
                        <input type="password" id="password" class='toggle-password-icon' name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword('toggle-password-icon')">
                            <img src="{{asset('images/view.png')}}" alt="Show Password" class='toggle-password-icon'/>
                        </span>
                    </div>

                    <button type="submit">Login</button>
                </fieldset>

                <p class="forgot-password">
                    <a href="/forgot-password">Forgot Password?</a>
                </p>
                <p class="signup-link">
                    Don't have an account? <a href="/register">Sign up here</a>
                </p>
            </form>
        </div>
    </div>

@endsection
