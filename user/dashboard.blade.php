@extends('layouts.panel')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')
    <div class="hero">
        <h3>Hello, {{ auth()->user()->name }}</h3>
        <p>{{ $count }} {{ \Illuminate\Support\Str::plural('coupon', $count) }} can be used today.</p>
    </div>

    <div class="card">
        <div class="card-head">
            <h3>Newest coupons</h3>
            <a href="{{ route('user.coupons') }}" class="btn btn-ghost btn-sm">See all</a>
        </div>

        @if ($latest->isEmpty())
            <div class="empty"><i class="bi bi-ticket-perforated"></i>No coupons are available right now. Check back soon.</div>
        @else
            <div class="ticket-grid">
                @foreach ($latest as $coupon)
                    @include('user._ticket')
                @endforeach
            </div>
        @endif
    </div>
@endsection
