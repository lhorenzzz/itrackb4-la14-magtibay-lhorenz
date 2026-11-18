@extends('layouts.app')

@section('title', 'Log in')

@section('content')
<style>
    body {
        background-color: #12141d;
        color: #f8fafc;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 75vh;
        padding: 1rem;
    }

    .gaming-box {
        background-color: #1b1e2b;
        border: 1px solid #2d3246;
        border-top: 4px solid #6366f1;
        border-radius: 10px;
        padding: 2.25rem;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.45);
    }

    .gaming-box h2 {
        font-weight: 700;
        text-align: center;
        margin-bottom: 0.25rem;
        color: #ffffff;
    }

    .gaming-box p.subtitle {
        text-align: center;
        color: #94a3b8;
        font-size: 0.9rem;
        margin-bottom: 1.75rem;
    }

    .gaming-box .form-label {
        color: #cbd5e1;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .gaming-box .form-control {
        background-color: #12141d;
        border: 1px solid #2d3246;
        color: #ffffff;
        padding: 0.65rem 0.9rem;
        border-radius: 6px;
    }

    .gaming-box .form-control:focus {
        background-color: #12141d;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
        color: #ffffff;
    }

    .gaming-box .form-control.is-invalid {
        border-color: #ef4444;
    }

    .btn-play {
        width: 100%;
        background-color: #6366f1;
        border: none;
        color: #ffffff;
        font-weight: 600;
        padding: 0.7rem;
        border-radius: 6px;
        margin-top: 0.5rem;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .btn-play:hover {
        background-color: #4f46e5;
    }

    .btn-play:active {
        transform: scale(0.99);
    }
</style>

<div class="login-container">
    <div class="gaming-box">
        <h2>Log in</h2>
        <p class="subtitle">Sign in to your account to play</p>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            {{-- old('email') = puts the typed email back after a failed login --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- No value="" here: a password is never sent back to the page --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-play">Log in</button>
        </form>
    </div>
</div>
@endsection
