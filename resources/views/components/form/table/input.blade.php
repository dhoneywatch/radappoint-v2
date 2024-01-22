@props([
    'name',
    'descriptiveName',
    'type' => 'text'
])

<input class="form-control" type="{{ $type }}" name="{{ $name }}"
    {{ $attributes(['value' => old($name)]) }}
>
<x-form.error
    name="{{ $name }}"
/>

