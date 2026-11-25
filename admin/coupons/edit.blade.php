@extends('layouts.panel')

@section('title', 'Edit coupon')
@section('heading', 'Edit coupon')

@section('content')
    <div class="card narrow">
        <form method="POST" action="{{ route('admin.coupons.update', $coupon) }}" novalidate>
            @csrf
            @method('PUT')
            @include('admin.coupons._form')
            <div class="actions">
                <button type="submit" class="btn"><i class="bi bi-check-lg"></i> Save changes</button>
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
@endsection
