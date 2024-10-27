@props([
    'label' => '',
    'id' => '',
    'name' => '',
    'rows' => '3',
    'disabled' => false
])
<div class="form-group mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <textarea class="form-control" id="{{ $id }}" rows="{{ $rows }}" name="{{ $name }}" {{ $disabled ? 'disabled' : '' }}>{{ $slot }}</textarea>
</div>
