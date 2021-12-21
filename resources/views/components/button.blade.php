@if ($tag == 'button')
    <button {{ $attributes }} class="{{ $class }}" type="{{ $type }}">
        {{ $slot }}
    </button>
@endif

@if ($tag == 'anchor')
    <a {{ $attributes }} href="{{ $href }}" class="{{ $class }}">
        {{ $slot }}
    </a>
@endif

