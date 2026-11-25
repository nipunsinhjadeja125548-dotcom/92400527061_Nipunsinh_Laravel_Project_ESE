@extends('layouts.panel')

@section('title', 'Coupons')
@section('heading', 'All coupons')

@section('content')
    <div class="card">
        <div class="card-head">
            <h3>Coupon list</h3>
            <a href="{{ route('admin.coupons.create') }}" class="btn btn-sm"><i class="bi bi-plus-lg"></i> Add coupon</a>
        </div>

        <form method="GET" action="{{ route('admin.coupons.index') }}" class="toolbar">
            <div class="input-wrap">
                <i class="bi bi-search"></i>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search by coupon code">
            </div>
            <select name="status" aria-label="Filter by status">
                <option value="">All statuses</option>
                <option value="active" @selected(request('status') === 'active')>Active</option>
                <option value="inactive" @selected(request('status') === 'inactive')>Inactive</option>
            </select>
            <button type="submit" class="btn"><i class="bi bi-funnel"></i> Search</button>
            @if (request()->hasAny(['q', 'status']))
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-ghost">Clear</a>
            @endif
        </form>

        @if ($coupons->isEmpty())
            <div class="empty"><i class="bi bi-search"></i>No coupons match your search.</div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                    <tr><th>Code</th><th>Type</th><th>Value</th><th>Valid from</th><th>Valid until</th><th>Status</th><th>Actions</th></tr>
                    </thead>
                    <tbody>
                    @foreach ($coupons as $coupon)
                        <tr>
                            <td class="code">{{ $coupon->code }}</td>
                            <td>{{ ucfirst($coupon->discount_type) }}</td>
                            <td>{{ $coupon->label }}</td>
                            <td>{{ $coupon->valid_from->format('d M Y') }}</td>
                            <td>{{ $coupon->valid_until->format('d M Y') }}</td>
                            <td><span class="badge badge-{{ $coupon->state }}">{{ ucfirst($coupon->state) }}</span></td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.coupons.show', $coupon) }}" class="btn btn-ghost btn-sm" title="View"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-ghost btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <form method="POST" action="{{ route('admin.coupons.destroy', $coupon) }}" onsubmit="return confirm('Delete coupon {{ $coupon->code }}? This cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $coupons->links() }}
        @endif
    </div>
@endsection
