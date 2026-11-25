@extends('layouts.panel')

@section('title', 'Apply a coupon')
@section('heading', 'Apply a coupon')

@section('content')
    <div class="card narrow">
        <form method="POST" action="{{ route('user.apply') }}" novalidate>
            @csrf
            <div class="grid-2">
                <div class="field">
                    <label for="code">Coupon code</label>
                    <input type="text" id="code" name="code" value="{{ old('code', request('code')) }}" class="code @error('code') is-invalid @enderror" placeholder="e.g. WELCOME10" maxlength="30">
                    @error('code') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label for="amount">Order amount (₹), optional</label>
                    <input type="number" step="0.01" min="0" id="amount" name="amount" value="{{ old('amount') }}" class="@error('amount') is-invalid @enderror" placeholder="e.g. 1500">
                    @error('amount') <div class="error">{{ $message }}</div> @enderror
                </div>
            </div>
            <button type="submit" class="btn"><i class="bi bi-patch-check"></i> Check coupon</button>
        </form>

        @if ($result)
            @if ($result['ok'])
                <div class="result result-ok">
                    <strong><i class="bi bi-check-circle"></i> {{ $result['coupon']->code }} is valid: {{ $result['coupon']->label }} off</strong>
                    @if ($result['amount'] !== null)
                        <div class="sum">
                            <span>Order amount</span><span>₹{{ number_format($result['amount'], 2) }}</span>
                            <span>Discount</span><span>- ₹{{ number_format($result['discount'], 2) }}</span>
                            <span class="total">You pay</span><span class="total">₹{{ number_format($result['final'], 2) }}</span>
                        </div>
                    @endif
                </div>
            @else
                <div class="result result-bad"><i class="bi bi-x-circle"></i> {{ $result['message'] }}</div>
            @endif
        @endif
    </div>
@endsection
