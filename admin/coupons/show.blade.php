@extends('layouts.panel')

@section('title', $coupon->code)
@section('heading', 'Coupon details')

@section('content')
    <div class="ticket-grid" style="grid-template-columns:minmax(320px,520px);margin-bottom:1.5rem">
        <div class="ticket">
            <div class="ticket-main">
                <span class="code">{{ $coupon->code }}</span>
                <small>{{ ucfirst($coupon->discount_type) }} discount</small>
                <small>{{ $coupon->valid_from->format('d M Y') }} to {{ $coupon->valid_until->format('d M Y') }}</small>
                <span class="badge badge-{{ $coupon->state }}" style="margin-top:.7rem">{{ ucfirst($coupon->state) }}</span>
            </div>
            <div class="ticket-stub"><strong>{{ $coupon->label }}</strong><span>off</span></div>
        </div>
    </div>

    <div class="card narrow">
        <dl class="detail">
            <div><dt>Coupon code</dt><dd class="code">{{ $coupon->code }}</dd></div>
            <div><dt>Discount type</dt><dd>{{ ucfirst($coupon->discount_type) }}</dd></div>
            <div><dt>Discount value</dt><dd>{{ $coupon->label }}</dd></div>
            <div><dt>Valid from</dt><dd>{{ $coupon->valid_from->format('d M Y') }}</dd></div>
            <div><dt>Valid until</dt><dd>{{ $coupon->valid_until->format('d M Y') }}</dd></div>
            <div><dt>Status</dt><dd>{{ ucfirst($coupon->status) }}</dd></div>
        </dl>
        <div class="actions" style="margin-top:1.5rem">
            <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn"><i class="bi bi-pencil"></i> Edit</a>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-ghost">Back to list</a>
        </div>
    </div>
@endsection
