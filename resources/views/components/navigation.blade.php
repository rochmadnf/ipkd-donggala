<nav class="flex flex-row gap-x-4">
    <div>
        <a href="{{ route('welcome') }}" class="nav-menu {{ request()->routeIs('welcome') ? 'active-menu' : '' }}"
            wire:navigate @if (request()->routeIs('welcome')) aria-current="page" @endif>Beranda</a>
    </div>
    <div>
        <a href="{{ route('data') }}" class="nav-menu {{ request()->routeIs('data') ? 'active-menu' : '' }}" wire:navigate
            @if (request()->routeIs('data')) aria-current="page" @endif>Lampiran</a>
    </div>
    <div>
        <a href="{{ env('WEB_PORTAL_URL') }}" class="nav-menu">Web Portal &nearr;</a>
    </div>
</nav>
