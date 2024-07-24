@props(['name' => 'Nama Berkas', 'upload_date' => '23 Jul 1998', 'order' => 0, 'path' => null])

<div class="relative items-center rounded-md border border-slate-200 bg-white px-4 py-2 shadow-sm shadow-slate-300">
    <span
        class="absolute -left-2 -top-3 inline-flex size-5 items-center justify-center rounded-full border border-slate-200 bg-blue-500 font-mono text-xs text-white"
    >
        {{ $order }}
    </span>
    <div class="space-y-1">
        <h1 class="text-lg font-bold leading-[1.5rem] tracking-wide">{{ $name }}</h1>
        <h3 class="text-sm font-medium text-gray-800">{{ $upload_date }}</h3>
    </div>
    <div class="mt-3 flex flex-row gap-x-2">
        <button
            data-preview
            data-filepath="{{ $path }}"
            data-filename="{{ $order . '. ' . $name }}"
            data-upload-at="{{ $upload_date }}"
            class="inline-flex items-center rounded-md bg-blue-500 px-1.5 py-0.5 text-sm text-white transition duration-300 hover:opacity-75"
        >
            Tinjau
        </button>
        <a
            class="inline-flex items-center rounded-md bg-green-500 px-1.5 py-0.5 text-sm text-white transition duration-300 hover:opacity-75"
            href="{{ $path }}"
            download="{{ str()->of($order . '. ' . $name)->slug() }}"
        >
            Unduh
        </a>
    </div>
</div>
