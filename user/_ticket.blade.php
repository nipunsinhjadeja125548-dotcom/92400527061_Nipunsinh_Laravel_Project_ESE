<div class="ticket">
    <div class="ticket-main">
        <span class="code">{{ $coupon->code }}</span>
        <small>{{ ucfirst($coupon->discount_type) }} discount</small>
        <small>Valid until {{ $coupon->valid_until->format('d M Y') }}</small>
        <a href="{{ route('user.apply', ['code' => $coupon->code]) }}" class="btn btn-sm"><i class="bi bi-patch-check"></i> Use this code</a>
    </div>
    <div class="ticket-stub"><strong>{{ $coupon->label }}</strong><span>off</span></div>
</div>
