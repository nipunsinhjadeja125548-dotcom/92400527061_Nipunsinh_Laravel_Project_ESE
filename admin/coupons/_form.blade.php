<div class="field">
    <label for="code">Coupon code</label>
    <input type="text" id="code" name="code" value="{{ old('code', $coupon->code) }}" class="code @error('code') is-invalid @enderror" placeholder="e.g. WELCOME10" maxlength="30">
    @error('code') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="grid-2">
    <div class="field">
        <label for="discount_type">Discount type</label>
        <select id="discount_type" name="discount_type" class="@error('discount_type') is-invalid @enderror">
            <option value="percentage" @selected(old('discount_type', $coupon->discount_type) === 'percentage')>Percentage (%)</option>
            <option value="fixed" @selected(old('discount_type', $coupon->discount_type) === 'fixed')>Fixed amount (₹)</option>
        </select>
        @error('discount_type') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="field">
        <label for="discount_value">Discount value</label>
        <input type="number" step="0.01" min="0" id="discount_value" name="discount_value" value="{{ old('discount_value', $coupon->discount_value) }}" class="@error('discount_value') is-invalid @enderror">
        @error('discount_value') <div class="error">{{ $message }}</div> @enderror
    </div>
</div>

<div class="grid-2">
    <div class="field">
        <label for="valid_from">Valid from</label>
        <input type="date" id="valid_from" name="valid_from" value="{{ old('valid_from', optional($coupon->valid_from)->format('Y-m-d')) }}" class="@error('valid_from') is-invalid @enderror">
        @error('valid_from') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="field">
        <label for="valid_until">Valid until</label>
        <input type="date" id="valid_until" name="valid_until" value="{{ old('valid_until', optional($coupon->valid_until)->format('Y-m-d')) }}" class="@error('valid_until') is-invalid @enderror">
        @error('valid_until') <div class="error">{{ $message }}</div> @enderror
    </div>
</div>

<div class="field">
    <label for="status">Status</label>
    <select id="status" name="status" class="@error('status') is-invalid @enderror">
        <option value="active" @selected(old('status', $coupon->status) === 'active')>Active</option>
        <option value="inactive" @selected(old('status', $coupon->status) === 'inactive')>Inactive</option>
    </select>
    @error('status') <div class="error">{{ $message }}</div> @enderror
</div>
