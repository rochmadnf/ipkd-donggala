<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Meta Tag -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keyword" content="ipkd, ipkd donggala, kabupaten donggala, donggala" />
    <meta name="description"
        content="Website Resmi Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala Provinsi Sulawesi Tengah" />
    <meta name="author" content="Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala" />
    <meta name="geo.placename" content="Indonesia" />

    <x-favicon />

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:100,200,300,400,500,600,700" rel="stylesheet" />

    <title>{{ $title ?? 'Page Title' }} &mdash; {{ config('app.name') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased bg-slate-50 text-slate-900">
    <main class="min-h-screen w-full flex flex-col justify-center items-center gap-y-6">
        <div
            class="bg-white min-w-[800px] min-h-[500px] rounded-2xl border border-slate-300/80 border-b-4 p-2 flex flex-row gap-x-6">
            <aside class="pt-4 pb-8 px-8 bg-yellow-300 rounded-xl w-[350px] space-y-8">
                <div class="mx-auto py-2 px-4 rounded-xl bg-white flex items-center justify-center gap-x-4">
                    <img class="w-8" src="{{ asset('assets/kabupaten-donggala.png') }}" alt="logo">
                    <h2 class="font-bold uppercase text-sm">IPKD Kabupaten Donggala</h2>
                </div>

                {{ $illustration }}
            </aside>

            <section>
                <x-navigation />
                {{ $slot }}
            </section>


        </div>
        <footer class="text-slate-500 text-sm">
            &copy; Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala | All Right Reserved.
        </footer>
    </main>
</body>

</html>
