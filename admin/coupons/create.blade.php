@extends('layouts.panel')

@section('title', 'Add coupon')
@section('heading', 'Add coupon')

@section('content')
    <div class="card narrow">
        <form method="POST" action="{{ route('admin.coupons.store') }}" novalidate>
            @csrf
            @include('admin.coupons._form')
            <div class="actions">
                <button type="submit" class="btn"><i class="bi bi-check-lg"></i> Save coupon</button>
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
@endsection
