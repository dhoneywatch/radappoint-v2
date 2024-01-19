@props([
    'name',
    'descriptiveName'
])

<x-form.label
    name="{{ $name }}"
    descriptiveName="{{ $descriptiveName }}"
/>
<select name="{{ $name }}" class="form-select">
    {{ $slot }}
</select>
