@extends('layouts.app')

@section('title', 'Beranda')

@section('illustration', asset('assets/illustration/presentation.svg'))

@section('content')
    <x-heading label="Selamat Datang 👋🏼"
        detail="Website resmi Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala Provinsi Sulawesi Tengah." />

    <div class="flex flex-col space-y-2 lg:pt-4">
        <h3 class="text-2xl font-semibold leading-none tracking-tight">Apa itu IPKD ?</h3>
        <article class="prose prose-slate mx-auto md:prose-lg prose-a:underline">
            <p>
                Menurut
                <a href="https://peraturan.bpk.go.id/Home/Details/143371/permendagri-no-19-tahun-2020">
                    Permendagri Nomor 19 Tahun 2020
                </a>
                , Indeks Pengelolaan Keuangan Daerah yang selanjutnya disingkat
                <strong>IPKD</strong>
                adalah satuan ukuran yang ditetapkan berdasarkan seperangkat dimensi dan indikator untuk menilai
                kualitas kinerja tata kelola keuangan daerah yang efektif, efisien, transparan, dan akuntabel dalam
                periode tertentu.
            </p>
        </article>
    </div>

    <a href="{{ route('attachments') }}"
        class="flex w-fit flex-row items-center rounded-xl border border-b-4 border-gray-500/70 border-b-gray-900/70 bg-transparent px-4 py-2 transition duration-200 hover:border-blue-500 hover:border-b-blue-700 hover:bg-blue-300/30 hover:text-blue-700 active:border-b-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5 md:size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
        </svg>

        <span class="ml-1.5 text-base tracking-wide md:text-lg">Lampiran</span>
    </a>
@endsection
