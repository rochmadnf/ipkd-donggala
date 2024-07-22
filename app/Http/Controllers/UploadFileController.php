<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index()
    {
        $uploadedFiles = UploadFile::orderBy('sequence', 'ASC')->get();
        return view('pages.upload-file', compact('uploadedFiles'));
    }

    public function store(Request $request)
    {
        $validData = $request->validate(
            [
                'season_year' => ['bail', 'required', 'digits:4', 'int', 'min:1998', 'max:2110'],
                'name' => ['bail', 'required', 'string', 'min:3'],
                'file_attach' => ['bail', 'required', 'file', 'mimetypes:application/pdf', 'max:76800'],
                'uploaded_date' => ['bail', 'required', 'date', 'date_format:Y-m-d'],
            ],
            ['file_attach.max' => 'File maksimal 75MB'],
            [
                'uploaded_date' => 'Tanggal Unggah',
                'season_year' => 'Tahun',
                'name' => 'Nama File',
                'file_attach' => 'File'
            ]
        );

        // store file
        $filePath = $request->file('file_attach')->store('public/' .  $validData['season_year']);

        // store to DB
        UploadFile::create([
            'uploaded_at' => \Carbon\Carbon::createFromFormat('Y-m-d', $validData['uploaded_date']),
            'season_year' => $validData['season_year'],
            'name' => $validData['name'],
            'filepath' => str_replace('public/', '', $filePath),
            'sequence' => $this->getLastSequence($validData['season_year']),
        ]);


        return back()->with('success', 'Berkas berhasil di unggah.');
    }

    protected function getLastSequence($season)
    {
        $uploadedFiles = UploadFile::query();
        if (!is_null($latestSequence = $uploadedFiles->where('season_year', $season)->orderBy('sequence', 'DESC')?->first())) {
            return $latestSequence->sequence += 1;
        } else {
            return 1;
        }
    }
}
