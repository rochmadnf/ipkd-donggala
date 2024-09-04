<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <x-favicon />
        <title>Upload File</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="text-gray-900 antialiased">
        <main class="mx-auto flex min-h-screen w-full max-w-screen-lg flex-row items-center justify-center gap-x-8">
            <section class="w-2/4">
                <div class="space-y-8 rounded-md border border-slate-300/30 px-6 py-4">
                    <x-heading label="Unggah Berkas" detail="Silakan lengkapi form dibawah ini." />

                    @session('success')
                        <div
                            class="flex justify-between rounded border border-green-400 p-4 text-sm font-medium text-green-500"
                        >
                            <p class="flex-1">{{ session('success') }}</p>
                            <span class="cursor-pointer hover:text-green-700" onclick="this.parentElement.remove()">
                                X
                            </span>
                        </div>
                    @endsession

                    <form
                        action="{{ route('store.file') }}"
                        method="POST"
                        class="space-y-6"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <x-form.input
                            type="number"
                            label="Tahun"
                            name="season"
                            :placeholder="now()->format('Y')"
                            tabindex="1"
                            autofocus
                            min="1998"
                            :max="now()->addYears(10)->format('Y')"
                        />
                        <x-form.input
                            label="Nama Berkas"
                            name="name"
                            placeholder="Ringkasan Dokumen RKPD"
                            tabindex="2"
                        />
                        <x-form.input label="Berkas" type="file" name="path" tabindex="3" />
                        <x-form.input
                            label="Tanggal Unggah"
                            type="date"
                            name="uploaded_at"
                            placeholder="dd-mm-yyyy"
                            tabindex="4"
                        />
                        <button
                            class="mt-4 w-full rounded-md bg-blue-500 px-4 py-2 font-medium text-white hover:bg-opacity-70"
                            tabindex="5"
                        >
                            Simpan
                        </button>
                    </form>
                </div>
            </section>

            <section class="w-2/4 space-y-4 rounded-md border border-slate-300/30 p-6">
                <x-heading label="Daftar Berkas" detail="Daftar berkas yang telah di Unggah." />
                {{-- List file after upload --}}
                <h1>Coming Soon.</h1>
            </section>
        </main>
    </body>
</html>
