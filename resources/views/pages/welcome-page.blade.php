<div>

    <x-slot name="illustration">
        <img class="opacity-85" src="{{ asset('assets/illustration/presentation.svg') }}" alt="illustration" />
    </x-slot>

    {{-- Content --}}
    <div class="pt-6 w-[512px] space-y-6">
        <div class="flex flex-col space-y-1.5">
            <h3 class="text-3xl font-semibold leading-none tracking-tight">Selamat Datang 👋🏼.</h3>
            <p class="text-base text-muted-foreground">Website resmi Indeks Pengelolaan Keuangan Daerah Kabupaten
                Donggala Provinsi Sulawesi Tengah.</p>
        </div>

        <article class="prose prose-slate mx-auto">
            <p>Menurut <a href="https://peraturan.bpk.go.id/Home/Details/143371/permendagri-no-19-tahun-2020">Permendagri
                    Nomor 19 Tahun 2020</a>,
                Indeks Pengelolaan Keuangan Daerah yang selanjutnya disingkat <strong>IPKD</strong> adalah satuan ukuran
                yang ditetapkan
                berdasarkan seperangkat dimensi dan indikator untuk menilai kualitas kinerja tata kelola keuangan daerah
                yang efektif, efisien, transparan, dan akuntabel dalam periode tertentu.</p>
        </article>

        <a href="{{ route('attachments') }}" wire:navigate
            class="flex flex-row items-center bg-transparent border border-gray-500/70 border-b-4 border-b-gray-900/70 active:border-b-0 w-fit px-5 py-2 rounded-xl hover:bg-blue-300/30 hover:border-blue-500 hover:border-b-blue-700 hover:text-blue-700 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>

            <span class="ml-1.5 text-lg">Lampiran</span>

        </a>
    </div>

</div>
