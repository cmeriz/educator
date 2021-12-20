@if ($tag == 'button')
    <button class="{{ $class }}" type="{{ $type }}">
        {{ $slot }}
    </button>
@endif

@if ($tag == 'anchor')
    <a href="{{ $href }}" class="{{ $class }}">
        {{ $slot }}
    </a>
@endif

