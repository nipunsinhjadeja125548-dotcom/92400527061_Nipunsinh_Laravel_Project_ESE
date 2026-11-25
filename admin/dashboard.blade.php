@extends('layouts.panel')

@section('title', 'Admin dashboard')
@section('heading', 'Dashboard')

@section('content')
    <div class="stats">
        <div class="stat"><div class="ico ico-ink"><i class="bi bi-tags"></i></div><div><b>{{ $stats['total'] }}</b><span>Total coupons</span></div></div>
        <div class="stat"><div class="ico ico-teal"><i class="bi bi-lightning-charge"></i></div><div><b>{{ $stats['live'] }}</b><span>Live today</span></div></div>
        <div class="stat"><div class="ico ico-amber"><i class="bi bi-pause-circle"></i></div><div><b>{{ $stats['inactive'] }}</b><span>Inactive</span></div></div>
        <div class="stat"><div class="ico ico-red"><i class="bi bi-calendar-x"></i></div><div><b>{{ $stats['expired'] }}</b><span>Past expiry date</span></div></div>
    </div>

    <div class="card">
        <div class="card-head">
            <h3>Recently added</h3>
            <a href="{{ route('admin.coupons.create') }}" class="btn btn-sm"><i class="bi bi-plus-lg"></i> Add coupon</a>
        </div>

        @if ($recent->isEmpty())
            <div class="empty"><i class="bi bi-ticket-perforated"></i>No coupons yet. Add your first coupon to get started.</div>
        @else
            <div class="table-wrap">
                <table>
                    <thead><tr><th>Code</th><th>Discount</th><th>Valid until</th><th>Status</th></tr></thead>
                    <tbody>
                    @foreach ($recent as $coupon)
                        <tr>
                            <td><a class="code" href="{{ route('admin.coupons.show', $coupon) }}">{{ $coupon->code }}</a></td>
                            <td>{{ $coupon->label }} off</td>
                            <td>{{ $coupon->valid_until->format('d M Y') }}</td>
                            <td><span class="badge badge-{{ $coupon->state }}">{{ ucfirst($coupon->state) }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
