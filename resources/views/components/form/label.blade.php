@props([
    'name',
    'descriptiveName',
])

<label for="{{ $name }}" class="form-label" aria-label="{{ $descriptiveName }}">
    {{ $descriptiveName }}
</label>
