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
        $files = UploadFile::latest()->get();

        return view('pages.upload', [
            'files' => UploadFileResource::collection($files)->resolve(),
        ]);
    }

    public function store(Request $request)
    {
        $validData = $request->validate(
            [
                'season' => ['bail', 'required', 'digits:4', 'int', 'min:1998', 'max:2110'],
                'name' => ['bail', 'required', 'string', 'min:3'],
                'path' => ['bail', 'required', 'file', 'mimetypes:application/pdf', 'max:204800'],
                'uploaded_at' => ['bail', 'required', 'date', 'date_format:Y-m-d'],
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
            'uploaded_at' => \Carbon\Carbon::createFromFormat('Y-m-d', $validData['uploaded_at']),
            'season' => $validData['season'],
            'name' => $validData['name'],
            'path' => $filePath,
            'sequence' => $this->getLastSequence($validData['season']),
        ]);


        return back()->with('success', 'Berkas berhasil di unggah.');
    }

    public function destroy(string $uuid)
    {
        $file = UploadFile::where('uuid', $uuid)->firstOrFail();

        Storage::disk('attachment')->delete($file->path);

        $file->delete();

        return back()->with('success-del', "Berkas {$file->name} / {$file->season} berhasil dihapus.");
    }
}
