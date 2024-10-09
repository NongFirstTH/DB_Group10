@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-gray-800 border-gray-600 text-m 
            font-medium '
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-m font-medium leading-5 text-[#2d2424]-100 dark:text-gray-400 
            hover:text-[#2d2424] dark:hover:text-gray-300 hover:border-gray-900 dark:hover:border-gray-700 focus:outline-none focus:text-black-700 
            dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
