<!DOCTYPE html>
<html lang="id">
    <head>
        <!-- Meta Tag -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="keyword"
            content="indeks pengelolaan keuangan daerah, ipkd, ipkd donggala, kabupaten donggala, donggala"
        />
        <meta
            name="description"
            content="Website Resmi Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala Provinsi Sulawesi Tengah"
        />
        <meta name="author" content="Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala" />
        <meta name="geo.placename" content="Indonesia" />

        <x-favicon />

        {{-- fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=outfit:100,200,300,400,500,600,700" rel="stylesheet" />

        <title>@yield('title') &mdash; {{ config('app.name') }}</title>

        @vite(['resources/css/app.css'])
        <!-- Scripts -->
        @yield('pageScript')
    </head>

    <body class="bg-gray-50 text-gray-900 antialiased">
        <main class="flex min-h-screen w-full flex-col items-center justify-center gap-y-6">
            <div
                class="flex h-[550px] w-[1024px] flex-row gap-x-6 rounded-2xl border border-b-4 border-slate-300/80 bg-white p-2"
            >
                <aside class="w-[350px] space-y-12 rounded-xl bg-yellow-300 px-8 pb-8 pt-4">
                    <div class="mx-auto flex items-center justify-center gap-x-4 rounded-xl bg-white px-4 py-2">
                        <img class="w-8" src="{{ asset('assets/icons/logo.png') }}" alt="logo" />
                        <h2 class="text-sm font-bold uppercase">IPKD Kabupaten Donggala</h2>
                    </div>
                    <img class="opacity-85" src="@yield('illustration')" alt="illustration" />
                    <h3 class="text-center text-3xl font-bold uppercase tracking-wider">
                        @yield('title')
                    </h3>
                </aside>

                <section class="flex-1 flex-shrink-0 space-y-4 pt-4">
                    <nav>
                        <ul class="flex flex-row gap-x-1.5 font-medium">
                            <x-nav-link routeName="welcome" label="Beranda" />
                            <x-nav-link routeName="attachments" label="Lampiran" />
                            <x-nav-link :redirect="true" :redirectLink="env('URL_WEB_PORTAL')" label="Web Portal" />
                        </ul>
                    </nav>
                    <div class="h-full w-full space-y-5 px-2 pt-4">
                        @yield('content')
                    </div>
                </section>
            </div>
            <footer class="text-sm text-slate-500">
                &copy; Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala | All Right Reserved.
            </footer>
        </main>
    </body>
</html>
