<div>

    <x-slot name="illustration">
        <img class="opacity-85" src="{{ asset('assets/illustration/check-document.svg') }}" alt="illustration" />
    </x-slot>

    {{-- Content --}}

    <div class="pt-6 w-[512px] space-y-6">
        <div class="flex flex-col space-y-1.5">
            <h3 class="text-2xl font-semibold leading-none tracking-tight">Lampiran</h3>
            <p class="text-sm text-muted-foreground">Daftar lampiran penunjang IPKD Kabupaten Donggala Provinsi Sulawesi
                Tengah.</p>
        </div>

        <section class="space-y-2">
            <h3
                class="font-medium text-slate-950 text-xl px-4 py-1.5 shadow-md w-fit border border-slate-300 rounded-md">
                2023
            </h3>

            <div class="overflow-y-auto rounded-md max-h-[275px] py-2 space-y-4">
                @forelse($uploadedFiles as $file)
                    <x-file-card :uploadedAt="$file->uploaded_at->translatedFormat('d M Y')" :filename="$file->sequence . '. ' . $file->name" :filepath="asset_storage($file->filepath)" />
                @empty
                    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            Lampiran belum tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </section>
    </div>

</div>
