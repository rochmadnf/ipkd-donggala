<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        return view('pages.upload');
    }

    public function store(Request $request)
    {
        $validData = $request->validate(
            [
                'season' => ['bail', 'required', 'digits:4', 'int', 'min:1998', 'max:2110'],
                'name' => ['bail', 'required', 'string', 'min:3'],
                'path' => ['bail', 'required', 'file', 'mimetypes:application/pdf', 'max:76800'],
                'uploaded_at' => ['bail', 'required', 'date', 'date_format:Y-m-d'],
            ],
            ['path.max' => 'File maksimal 75MB'],
            [
                'uploaded_at' => 'Tanggal Unggah',
                'season' => 'Tahun',
                'name' => 'Nama Berkas',
                'path' => 'Berkas'
            ]
        );

        // store file
        $filePath = $request->file('path')->store('public/' .  $validData['season']);

        // store to DB
        UploadFile::create([
            'uploaded_at' => \Carbon\Carbon::createFromFormat('Y-m-d', $validData['uploaded_at']),
            'season' => $validData['season'],
            'name' => $validData['name'],
            'path' => str_replace('public/', '', $filePath),
            'sequence' => $this->getLastSequence($validData['season']),
        ]);


        return back()->with('success', 'Berkas berhasil di unggah.');
    }
}
