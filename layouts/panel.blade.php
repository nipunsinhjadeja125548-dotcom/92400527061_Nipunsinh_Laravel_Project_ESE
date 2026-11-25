<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | CouponDesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@php
    $me = auth()->user();
    $isAdmin = $me->isAdmin();
@endphp
<div class="layout">
    <input type="checkbox" id="nav-toggle" hidden>

    <aside class="sidebar">
        <a class="brand" href="{{ route('home') }}"><i class="bi bi-ticket-perforated-fill"></i> CouponDesk</a>

        <nav class="nav">
            <div class="nav-label">{{ $isAdmin ? 'Admin panel' : 'User panel' }}</div>

            @if ($isAdmin)
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2"></i> Dashboard
                </a>
                <a href="{{ route('admin.coupons.index') }}" class="{{ request()->routeIs('admin.coupons.index', 'admin.coupons.show', 'admin.coupons.edit') ? 'active' : '' }}">
                    <i class="bi bi-tags"></i> All coupons
                </a>
                <a href="{{ route('admin.coupons.create') }}" class="{{ request()->routeIs('admin.coupons.create') ? 'active' : '' }}">
                    <i class="bi bi-plus-circle"></i> Add coupon
                </a>
            @else
                <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2"></i> Dashboard
                </a>
                <a href="{{ route('user.coupons') }}" class="{{ request()->routeIs('user.coupons') ? 'active' : '' }}">
                    <i class="bi bi-ticket-perforated"></i> Available coupons
                </a>
                <a href="{{ route('user.apply') }}" class="{{ request()->routeIs('user.apply') ? 'active' : '' }}">
                    <i class="bi bi-patch-check"></i> Apply a coupon
                </a>
            @endif
        </nav>

        <div class="sidebar-foot">
            <div class="me">
                <div class="avatar">{{ strtoupper(substr($me->name, 0, 1)) }}</div>
                <div>
                    <strong>{{ $me->name }}</strong>
                    <span>&#64;{{ $me->username }}</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn logout"><i class="bi bi-box-arrow-left"></i> Log out</button>
            </form>
        </div>
    </aside>

    <label for="nav-toggle" class="scrim" aria-label="Close menu"></label>

    <div class="main">
        <header class="topbar">
            <div class="topbar-left">
                <label for="nav-toggle" class="btn btn-ghost btn-sm menu-btn" aria-label="Open menu"><i class="bi bi-list"></i></label>
                <h2>@yield('heading')</h2>
            </div>
            <span class="role-chip">{{ $isAdmin ? 'Admin' : 'User' }}</span>
        </header>

        <div class="content">
            @if (session('success'))
                <div class="alert alert-ok"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error"><i class="bi bi-exclamation-circle"></i> {{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
