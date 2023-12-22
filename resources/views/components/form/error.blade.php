@props(['name'])

@error($name)
    <span class="text-sm text-red-500">{{ $message }}</span>
@enderror
