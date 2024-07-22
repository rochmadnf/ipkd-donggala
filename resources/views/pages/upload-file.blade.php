<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <x-favicon />
    <title>Upload File</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-gray-900">
    <main class="min-h-screen w-full max-w-screen-lg flex flex-row justify-center items-center mx-auto gap-x-8">
        <section class="w-2/4">
            <div class="border border-slate-300/30 px-6 py-4 rounded-md space-y-8">
                <div class="flex flex-col space-y-1.5">
                    <h3 class="text-2xl font-semibold leading-none tracking-tight">Unggah Berkas</h3>
                    <p class="text-sm text-muted-foreground">Silakan lengkapi form dibawah.</p>
                </div>

                @session('success')
                    <div
                        class="flex justify-between border border-green-400 text-green-500 font-medium p-4 rounded text-sm">
                        <p class="flex-1">{{ session('success') }}</p> <span class="cursor-pointer hover:text-green-700"
                            onclick="this.parentElement.remove()">X</span>
                    </div>
                @endsession

                <form action="{{ route('store.file') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <x-form.input label="Tahun" name="season_year" :value="now()->subYear()->format('Y')" />
                    <x-form.input label="Nama File" name="name" />
                    <x-form.input label="File" type="file" name="file_attach" :value="now()->subYear()->format('Y')" />
                    <x-form.input label="Tanggal Unggah" type="date" name="uploaded_date" placeholder="dd-mm-yyyy"
                        :value="now()->format('d/m/Y')" />

                    <button
                        class="mt-4 py-2 px-4 bg-blue-500 text-white rounded-md w-full font-medium hover:bg-opacity-70">Simpan</button>
                </form>
            </div>
        </section>
        <section class="w-2/4 border border-slate-300/30 p-6 space-y-4 rounded-md">
            <div class="flex flex-col space-y-1.5">
                <h3 class="text-2xl font-semibold leading-none tracking-tight">Daftar Berkas</h3>
                <p class="text-sm text-muted-foreground">Daftar berkas yang telah di Unggah.</p>
            </div>


            {{-- List file after upload --}}
            <h1>Coming Soon.</h1>
        </section>

    </main>

</body>

</html>
