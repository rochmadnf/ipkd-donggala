@extends('layouts.app')

@section('title', 'Lampiran')
@section('illustration', asset('assets/illustration/check-document.svg'))

@section('content')
    <x-heading
        label="Lampiran"
        detail="Daftar lampiran penunjang IPKD Kabupaten Donggala Provinsi Sulawesi
        Tengah."
    />

    <form id="formYear" action="{{ route('attachments') }}" method="GET" class="flex flex-row items-center gap-x-4">
        <button type="button" id="prevYear" class="rotate-180 hover:opacity-75">&#10132;</button>
        <input
            data-init-value="{{ $initSeason }}"
            name="season"
            id="seasonYear"
            type="tel"
            maxlength="4"
            minlength="4"
            min="1998"
            class="block w-20 rounded-md border border-b-[3px] p-2 text-center font-bold tracking-wide outline-none"
            value="{{ $initSeason }}"
        />
        <button type="button" id="nextYear" class="hover:opacity-75">&#10132;</button>
        <button type="submit" class="hidden rounded-md bg-blue-500 px-2.5 py-2 text-sm tracking-wide text-white">
            Terapkan
        </button>
    </form>

    <div class="max-h-[320px] space-y-4 overflow-y-auto p-4">
        @forelse ($files as $file)
            <x-card-file
                :path="asset_storage($file['filepath'])"
                :name="$file['filename']"
                :upload_date="$file['uploaded_at']->translatedFormat('d M Y')"
                :order="$file['order']"
            />
        @empty
            <div class="mb-4 flex items-center rounded-lg bg-blue-50 p-4 text-sm text-blue-800" role="alert">
                <svg
                    class="me-3 inline h-4 w-4 flex-shrink-0"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                    />
                </svg>
                <span class="sr-only">Info</span>
                <div>Lampiran belum tersedia.</div>
            </div>
        @endforelse
    </div>
@endsection

@section('pageScript')
    @vite(['resources/js/pages/attachments.js'])
@endsection
