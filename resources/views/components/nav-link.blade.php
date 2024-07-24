@props(['redirect' => false, 'redirectLink' => '#', 'label' => 'Link', 'routeName' => null])

@php
    $active = request()->routeIs($routeName);
@endphp

@if (! $redirect)
    <li>
        <a
            {{ $attributes->class(['nav-menu', 'active' => $active])->merge(['href' => route($routeName), 'aria-current' => $active ? 'page' : 'false']) }}
        >
            {{ $label }}
        </a>
    </li>
@else
    <li>
        <a
            {{ $attributes->merge(['href' => ! is_null($routeName) ? route($routeName) : $redirectLink]) }}
            class="nav-menu"
        >
            {{ $label }}
        </a>
    </li>
@endif
