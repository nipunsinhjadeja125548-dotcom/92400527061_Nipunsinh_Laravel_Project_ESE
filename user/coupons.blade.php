@extends('layouts.panel')

@section('title', 'Available coupons')
@section('heading', 'Available coupons')

@section('content')
    <form method="GET" action="{{ route('user.coupons') }}" class="toolbar">
        <div class="input-wrap">
            <i class="bi bi-search"></i>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search by coupon code">
        </div>
        <button type="submit" class="btn"><i class="bi bi-funnel"></i> Search</button>
        @if (request()->filled('q'))
            <a href="{{ route('user.coupons') }}" class="btn btn-ghost">Clear</a>
        @endif
    </form>

    @if ($coupons->isEmpty())
        <div class="card"><div class="empty"><i class="bi bi-search"></i>No available coupons match your search.</div></div>
    @else
        <div class="ticket-grid">
            @foreach ($coupons as $coupon)
                @include('user._ticket')
            @endforeach
        </div>

        {{ $coupons->links() }}
    @endif
@endsection
