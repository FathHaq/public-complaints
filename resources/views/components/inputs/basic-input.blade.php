@props([
    'label' => '',
    'id' => '',
    'placeholder' => '',
    'type' => 'text',
    'name' => '',
    'disabled' => false,
    'value' => '',
])
<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} value="{{ $value }}">
</div>
