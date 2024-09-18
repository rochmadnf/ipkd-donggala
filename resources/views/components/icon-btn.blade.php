{{-- Berguna hanya untuk penggunaan icon dari heroicons.com --}}

@props(['route' => '#', 'label' => 'Unknown', 'activeSvg' => null, 'normalSvg' => null])
@php
    $active = sanitize_protocol(request()->fullUrl()) === sanitize_protocol($route);
@endphp

<li>
    <a role="button" href="{{ $route }}"
        class="rounded inline-flex flex-col items-center px-4 py-2 text-sm transition duration-150
         hover:bg-[#578fdc] hover:text-white {{ $active ? 'bg-[#578fdc] text-white font-medium' : 'text-gray-500/80 font-normal' }}">
        @if ($active)
            {{ $activeSvg }}
        @else
            {{ $normalSvg }}
        @endif
        {{ $label }}
    </a>
</li>
