@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-block bg-orange-600 text-white font-bold pt-3 py-4 px-6 mt-5 rounded hover:bg-orange-500 transition text-center'
            : 'inline-block bg-gray-900 text-white font-bold pt-3 py-4 px-6 mt-5 rounded hover:bg-orange-500 transition text-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>