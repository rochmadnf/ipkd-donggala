@props([
    'uuid' => '',
    'name' => 'Nama Berkas',
    'upload_date' => '23 Jul 1998',
    'order' => 0,
    'path' => null,
    'btnDelete' => false,
])

<div class="relative items-center rounded-md border border-slate-200 bg-white px-4 py-2 shadow-sm shadow-slate-300">
    <span
        class="absolute -left-2 -top-3 inline-flex size-5 items-center justify-center rounded-full border border-slate-200 bg-blue-500 font-mono text-xs text-white">
        {{ $order }}
    </span>
    <div class="space-y-1">
        <h1 class="text-lg font-bold leading-[1.5rem] tracking-wide">{{ $name }}</h1>
        <h3 class="text-sm font-medium text-gray-800">{{ $upload_date }}</h3>
    </div>
    <div class="mt-3 flex flex-row gap-x-2">
        @if (!$btnDelete)
            <button data-preview data-filepath="{{ $path }}" data-filename="{{ $order . '. ' . $name }}"
                data-upload-at="{{ $upload_date }}"
                class="inline-flex items-center rounded-md bg-blue-500 px-1.5 py-0.5 text-sm text-white transition duration-300 hover:opacity-75">
                Tinjau
            </button>
            <a class="inline-flex items-center rounded-md bg-green-500 px-1.5 py-0.5 text-sm text-white transition duration-300 hover:opacity-75"
                href="{{ $path }}" download="{{ $name . '.pdf' }}">
                Unduh
            </a>
        @else
            <div class="flex items-center gap-x-4">
                <form action="{{ route('delete.file', ['uuid' => $uuid]) }}" method="post"
                    onsubmit="return confirm('Yakin ingin menghapus file ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-full bg-red-500 p-2 text-white hover:bg-red-600"
                        title="Hapus Berkas">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="pointer-events-none size-5"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M10 11v6" />
                            <path d="M14 11v6" />
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                            <path d="M3 6h18" />
                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                        </svg>
                    </button>
                </form>

                <a role="button"
                    class="inline-flex items-center justify-center rounded-full bg-amber-500 p-2 hover:bg-amber-600 hover:text-white"
                    href="{{ route('index.file', ['act' => 'e-data', 'id' => $uuid]) }}" title="Ubah Data Berkas">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="pointer-events-none size-5"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil">
                        <path
                            d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                        <path d="m15 5 4 4" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
