@props(['active' => false, 'href' => '#'])

<li>
    <a href="{{ $href }}" 
       class="{{ $active 
           ? 'flex items-center p-2 text-white bg-blue-600 rounded-lg group transition-colors' 
           : 'flex items-center p-2 text-gray-900 dark:text-gray-100 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group transition-colors' }}">
        <span class="{{ $active ? 'text-white' : 'text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray-100' }} transition-colors">
            {{ $icon }}
        </span>
        <span class="ms-3">{{ $slot }}</span>
    </a>
</li>