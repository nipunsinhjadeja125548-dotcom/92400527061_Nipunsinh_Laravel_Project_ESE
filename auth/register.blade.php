@extends('layouts.auth')

@section('title', 'Create account')
@section('headline', 'Find a coupon. Check it. Save.')
@section('subline', 'Create a free account to browse live coupons and test a code before you pay.')

@section('content')
    <h2>Create your account</h2>
    <p class="sub">It takes less than a minute.</p>

    <form method="POST" action="{{ route('register.store') }}" novalidate>
        @csrf
        <div class="field">
            <label for="name">Full name</label>
            <div class="input-wrap">
                <i class="bi bi-person-badge"></i>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" autofocus>
            </div>
            @error('name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="username">Username</label>
            <div class="input-wrap">
                <i class="bi bi-at"></i>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="@error('username') is-invalid @enderror" autocomplete="username">
            </div>
            @error('username') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="grid-2">
            <div class="field">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <i class="bi bi-lock"></i>
                    <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" autocomplete="new-password">
                </div>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label for="password_confirmation">Confirm password</label>
                <div class="input-wrap">
                    <i class="bi bi-lock-fill"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-block"><i class="bi bi-person-plus"></i> Create account</button>
    </form>

    <p class="switch">Already registered? <a href="{{ route('login') }}">Log in</a></p>
@endsection
