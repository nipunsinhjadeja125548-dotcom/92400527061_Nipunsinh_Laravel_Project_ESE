@extends('layouts.auth')

@section('title', 'Log in')
@section('headline', 'Every discount in one place.')
@section('subline', 'Admins manage the coupons. Customers find the ones they can use today.')

@section('content')
    <h2>Log in</h2>
    <p class="sub">Enter your username and password.</p>

    @if (session('error'))
        <div class="alert alert-error"><i class="bi bi-exclamation-circle"></i> {{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}" novalidate>
        @csrf
        <div class="field">
            <label for="username">Username</label>
            <div class="input-wrap">
                <i class="bi bi-person"></i>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="@error('username') is-invalid @enderror" autocomplete="username" autofocus>
            </div>
            @error('username') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <div class="input-wrap">
                <i class="bi bi-lock"></i>
                <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" autocomplete="current-password">
            </div>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <label class="check"><input type="checkbox" name="remember"> Keep me logged in</label>

        <button type="submit" class="btn btn-block"><i class="bi bi-box-arrow-in-right"></i> Log in</button>
    </form>

    <p class="switch">New here? <a href="{{ route('register') }}">Create an account</a></p>

    <div class="demo-box">
        <strong>Demo logins:</strong> admin / admin123 &nbsp;&middot;&nbsp; user / user123
    </div>
@endsection
