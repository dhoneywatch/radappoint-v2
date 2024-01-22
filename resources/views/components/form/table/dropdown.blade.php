@props([
    'name',
    'descriptiveName'
])

<select name="{{ $name }}" class="form-select">
    {{ $slot }}
</select>
