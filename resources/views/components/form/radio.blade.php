@props([
    'name',
    'descriptiveName',

])

<x-form.label
    name="{{ $name }}"
    descriptiveName="{{ $descriptiveName }}"
/>
<input class="form-control" type="radio" name="{{ $name }}" value="{{ $name }}" id="{{ $name }}"
    {{ $attributes(['value' => old($name)]) }}
>
<x-form.error
    name="{{ $name }}"
/>

