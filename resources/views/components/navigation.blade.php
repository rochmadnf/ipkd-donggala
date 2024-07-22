<nav class="flex flex-row gap-x-4">
    <div>
        <a href="{{ route('welcome') }}" class="nav-menu {{ request()->routeIs('welcome') ? 'active-menu' : '' }}"
            wire:navigate @if (request()->routeIs('welcome')) aria-current="page" @endif>Beranda</a>
    </div>
    <div>
        <a href="{{ route('attachments') }}" class="nav-menu {{ request()->routeIs('attachments') ? 'active-menu' : '' }}"
            wire:navigate @if (request()->routeIs('attachments')) aria-current="page" @endif>Lampiran</a>
    </div>
    <div>
        <a href="{{ env('WEB_PORTAL_URL') }}" class="nav-menu">Web Portal</a>
    </div>
</nav>
