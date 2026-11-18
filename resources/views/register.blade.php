@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
    body {
        background-color: #12141d;
        color: #f8fafc;
    }

    .register-container {
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
        max-width: 420px;
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

<div class="register-container">
    <div class="gaming-box">
        <h2>Create an account</h2>
        <p class="subtitle">Join now and start playing</p>

        {{-- method="POST" + @csrf = a safe form submission --}}
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            {{-- old('name') = puts back what the user typed after a failed submit --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- No value="" on password fields. A password should never be sent back to the page. --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- name must be exactly "password_confirmation". The "confirmed" rule looks for it. --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="form-control">
            </div>

            <button type="submit" class="btn btn-play">Register</button>
        </form>
    </div>
</div>
@endsection
