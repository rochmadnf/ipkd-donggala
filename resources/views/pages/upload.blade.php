<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <x-favicon />
    <title>Upload File</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/upload-file.js'])
</head>

<body class="text-gray-900 antialiased">
    <main class="mx-auto flex min-h-screen w-full max-w-screen-lg flex-row items-center justify-center gap-x-8">
        <section class="min-h-[512px] w-2/4">
            <div class="space-y-8 rounded-md border border-slate-300/30 px-6 py-4">
                <x-heading label="{{ $pageName }}" detail="Silakan lengkapi form dibawah ini." />

                @session('success')
                    <div
                        class="flex justify-between rounded border border-green-400 p-4 text-sm font-medium text-green-500">
                        <p class="flex-1">{{ session('success') }}</p>
                        <span class="cursor-pointer hover:text-green-700" onclick="this.parentElement.remove()">
                            X
                        </span>
                    </div>
                @endsession

                <form
                    action="{{ $act === 'e-data' ? route('update.file', ['uuid' => $editFile['id']]) : route('store.file') }}"
                    method="POST" class="space-y-6" enctype="multipart/form-data"
                    onsubmit="this.querySelector('button[type=submit]').disabled=true; this.querySelector('button[type=submit]').innerText='Menyimpan berkas...';">
                    @csrf
                    @if ($act === 'e-data' || $act === 'e-file')
                        @method('PATCH')
                    @endif

                    @if ($act === 'e-data' || $act === null)
                        <x-form.input type="number" label="Tahun" name="season" :placeholder="now()->format('Y')" tabindex="1"
                            autofocus min="1998" :max="now()->addYears(10)->format('Y')" :value="old('season', $editFile['season'] ?? null)" />
                        <x-form.input label="Nama Berkas" name="name" placeholder="Ringkasan Dokumen RKPD"
                            tabindex="2" :value="old('name', $editFile['filename'] ?? null)" />
                        <x-form.input label="Tanggal Unggah" type="text" name="uploaded_at" placeholder="dd-mm-yyyy"
                            :data-up-date="old(
                                'uploaded_at',
                                !is_null($editFile) ? $editFile['uploaded_at']->format('d-m-Y') : null,
                            )" tabindex="3" />
                    @endif

                    @if ($act === 'e-file' || $act === null)
                        <x-form.input label="Berkas" type="file" name="path" tabindex="4" />
                    @endif

                    <div class="flex items-center justify-between gap-x-4">
                        <button type="submit"
                            class="mt-4 w-full rounded-md bg-blue-500 px-4 py-2 font-medium text-white hover:bg-opacity-70"
                            tabindex="5">
                            Simpan
                        </button>

                        @if ($act === 'e-data' || $act === 'e-file')
                            <a href="{{ route('index.file') }}"
                                class="mt-4 w-full rounded-md bg-gray-500 px-4 py-2 text-center font-medium text-white hover:bg-opacity-70"
                                tabindex="6">
                                Batal
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </section>

        <section class="min-h-[512px] w-2/4 space-y-4 rounded-md border border-slate-300/30 p-6">
            <x-heading label="Daftar Berkas" detail="Daftar berkas yang telah di Unggah." />

            @session('success-del')
                <div class="flex justify-between rounded border border-green-400 p-4 text-sm font-medium text-green-500">
                    <p class="flex-1">{{ session('success-del') }}</p>
                    <span class="cursor-pointer hover:text-green-700" onclick="this.parentElement.remove()">
                        X
                    </span>
                </div>
            @endsession

            <div class="max-h-[400px] w-full space-y-6 overflow-y-auto rounded-md border border-gray-300/30 p-4">
                @forelse ($files as $file)
                    <x-card-file :uuid="$file['id']" :path="asset('files/' . $file['filepath'])" :name="$file['filename']" :upload_date="$file['uploaded_at']->translatedFormat('d M Y')" order="~"
                        :btnDelete="true" />
                @empty
                    <div class="mb-4 flex items-center rounded-lg bg-blue-50 p-4 text-sm text-blue-800" role="alert">
                        <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>Lampiran belum tersedia.</div>
                    </div>
                @endforelse
            </div>
        </section>
    </main>
</body>

</html>
