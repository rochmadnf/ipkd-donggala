<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Meta Tag -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keyword"
        content="indeks pengelolaan keuangan daerah, ipkd, ipkd donggala, kabupaten donggala, donggala" />
    <meta name="description"
        content="Website Resmi Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala Provinsi Sulawesi Tengah" />
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

    <x-bottom-nav />

    <main class="flex min-h-screen w-full flex-col items-center gap-y-6 lg:justify-center">
        <div
            class="flex flex-col bg-white pb-4 max-w-[512px] lg:max-w-full lg:h-[550px] lg:w-[1024px] lg:flex-row lg:gap-x-6 lg:rounded-2xl lg:border lg:border-b-4 lg:border-slate-300/80 lg:p-2">
            <aside class="space-y-8 bg-yellow-300 px-8 pb-8 pt-4 lg:w-[350px] lg:space-y-12 lg:rounded-xl">
                <div
                    class="mx-auto flex w-fit flex-row items-center justify-center gap-x-2 rounded-xl bg-white px-4 py-2 [@media(min-width:400px)]:gap-x-4">
                    <img class="w-8" src="{{ asset('assets/icons/logo.png') }}" alt="logo" />
                    <h2 class="text-xs font-bold uppercase [@media(min-width:400px)]:text-sm">
                        IPKD Kabupaten Donggala
                    </h2>
                </div>
                <img class="mx-auto w-60 opacity-85 lg:w-full" src="@yield('illustration')" alt="illustration" />
                <h3 class="text-center text-2xl font-bold uppercase tracking-wider lg:text-3xl">
                    @yield('title')
                </h3>
            </aside>

            <section class="flex-1 flex-shrink-0 space-y-4 pt-4">
                <nav class="hidden lg:block">
                    <ul class="flex flex-row gap-x-1.5 font-medium">
                        <x-nav-link routeName="welcome" label="Beranda" />
                        <x-nav-link routeName="attachments" label="Lampiran" />
                        <x-nav-link :redirect="true" :redirectLink="env('URL_WEB_PORTAL')" label="Web Portal" />
                    </ul>
                </nav>
                <div class="h-full w-full space-y-5 px-5 lg:px-2 lg:pt-4">
                    @yield('content')
                </div>
            </section>
        </div>
        <footer class="pb-24 text-center text-xs text-slate-500 lg:pb-0 lg:text-sm">
            &copy; Indeks Pengelolaan Keuangan Daerah Kabupaten Donggala | All Right Reserved.
        </footer>
    </main>
</body>

</html>
