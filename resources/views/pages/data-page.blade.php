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

        <section class="space-y-6">
            <h3
                class="font-medium text-slate-950 text-xl px-4 py-1.5 shadow-md w-fit border border-slate-300 rounded-md">
                2023
            </h3>

            <div class="overflow-y-auto rounded-md max-h-[275px] py-2">
                <x-dimension.one />
            </div>
        </section>
    </div>

</div>
