<?php

namespace App\Http\Controllers;

use App\Http\Resources\UploadFileResource;
use App\Models\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    protected function getLastSequence($season)
    {
        $uploadedFiles = UploadFile::query();
        if (!is_null($latestSequence = $uploadedFiles->where('season', $season)->orderBy('sequence', 'DESC')?->first())) {
            return $latestSequence->sequence += 1;
        } else {
            return 1;
        }
    }

    public function index(): View
    {
        $editFile = null;


        $files = UploadFile::latest()->get();

        if (request()->has('act') && request()->get('act') === 'e-data' && request()->has('id')) {
            $editFile = UploadFileResource::make(UploadFile::where('uuid', request()->get('id'))->firstOrFail())->resolve();
        }

        return view('pages.upload', [
            'files' => UploadFileResource::collection($files)->resolve(),
            'editFile' => $editFile,
            'pageName' => match (request()->get('act', null)) {
                'e-data' => 'Ubah Data Berkas',
                'e-file' => 'Ubah Berkas',
                default => 'Unggah Berkas',
            },
            'act' => request()->get('act', null),
        ]);
    }

    public function store(Request $request)
    {
        $validData = $request->validate(
            [
                'season' => ['bail', 'required', 'digits:4', 'int', 'min:1998', 'max:2110'],
                'name' => ['bail', 'required', 'string', 'min:3'],
                'path' => ['bail', 'required', 'file', 'mimetypes:application/pdf', 'max:204800'],
                'uploaded_at' => ['bail', 'required', 'date', 'date_format:d-m-Y'],
            ],
            ['path.max' => 'File maksimal 200MB', 'path.mimetypes' => 'Berkas harus berupa PDF.'],
            [
                'uploaded_at' => 'Tanggal Unggah',
                'season' => 'Tahun',
                'name' => 'Nama Berkas',
                'path' => 'Berkas'
            ]
        );

        // store file
        $filePath = Storage::disk('attachment')->putFileAs($validData['season'], $request->file('path'), $validData['name'] . "-" . time() .  "." . $request->file('path')->getClientOriginalExtension());

        // store to DB
        UploadFile::create([
            'uploaded_at' => \Carbon\Carbon::createFromFormat('d-m-Y', $validData['uploaded_at']),
            'season' => $validData['season'],
            'name' => $validData['name'],
            'path' => $filePath,
            'sequence' => $this->getLastSequence($validData['season']),
        ]);


        return back()->with('success', 'Berkas berhasil di unggah.');
    }

    public function update(Request $request, string $uuid)
    {
        $file = UploadFile::where('uuid', $uuid)->firstOrFail();

        if ($request->has('season') && $request->has('name') && $request->has('uploaded_at')) {
            $validData = $request->validate(
                [
                    'season' => ['bail', 'required', 'digits:4', 'int', 'min:1998', 'max:2110'],
                    'name' => ['bail', 'required', 'string', 'min:3'],
                    'uploaded_at' => ['bail', 'required', 'date', 'date_format:d-m-Y'],
                ],
                [
                    'uploaded_at.date_format' => 'Format tanggal unggah tidak valid. Gunakan format dd-mm-yyyy.',
                ],
                [
                    'uploaded_at' => 'Tanggal Unggah',
                    'season' => 'Tahun',
                    'name' => 'Nama Berkas',
                ]
            );

            if ($validData['season'] !== $file->season) {
                // Update sequence if season changed
                $validData['sequence'] = $this->getLastSequence($validData['season']);

                Storage::disk('attachment')->move($file->path, str_replace($file->season . '/', $validData['season'] . '/', $file->path));
                $file->path = str_replace($file->season . '/', $validData['season'] . '/', $file->path);
            }

            $file->update([
                'season' => $validData['season'],
                'name' => $validData['name'],
                'uploaded_at' => \Carbon\Carbon::createFromFormat('d-m-Y', $validData['uploaded_at']),
            ]);

            return to_route('index.file')->with('success', "Data berkas {$file->name} / {$file->season} berhasil diperbarui.");
        }

        return back()->withErrors(['msg' => 'Tidak ada data yang diubah.']);
    }

    public function destroy(string $uuid)
    {
        $file = UploadFile::where('uuid', $uuid)->firstOrFail();

        Storage::disk('attachment')->delete($file->path);

        $file->delete();

        return back()->with('success-del', "Berkas {$file->name} / {$file->season} berhasil dihapus.");
    }
}
