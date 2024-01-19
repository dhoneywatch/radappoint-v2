@props([
    'name',
    'descriptiveName',
    'type' => 'text'
])

<x-form.label
    name="{{ $name }}"
    descriptiveName="{{ $descriptiveName }}"
/>
<input class="form-control" type="{{ $type }}" name="{{ $name }}"
    {{ $attributes(['value' => old($name)]) }}
>
<x-form.error
    name="{{ $name }}"
/>

