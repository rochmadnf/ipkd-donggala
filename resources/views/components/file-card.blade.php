<div class="flex flex-row gap-x-4 items-center border border-slate-300/70 p-2 rounded-md">
    <div class="self-start border border-slate-300/50 bg-slate-100 h-full w-20 p-2 rounded-md">
        <img src="{{ asset('assets/icons/pdf.svg') }}" alt="icon file">
    </div>
    <div class="flex-1 flex flex-col">
        <h1 class="text-lg font-medium text-slate-950">{{ $filename }}</h1>
        <h3 class="text-sm text-slate-900 mb-1.5">{{ $uploadedAt }}</h3>
        <div class="flex flex-row gap-x-4">
            <button class="inline-flex items-center hover:opacity-65" data-action="previewAttachment"
                data-filepath="{{ $filepath }}" data-filename="{{ $filename }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="ml-1 text-sm">Tinjau</span>
            </button>
            <a class="flex flex-row items-center hover:opacity-65" href="{{ $filepath }}"
                download="{{ str()->of($filename)->slug() }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                <span class="ml-1.5 text-sm">Unduh</span>
            </a>
        </div>
    </div>
</div>
