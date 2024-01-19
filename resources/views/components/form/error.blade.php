@props([
    'name',
])

@error($name)
<p class="text-danger fs-6 mt-2">{{ $message }}</p>
@enderror
