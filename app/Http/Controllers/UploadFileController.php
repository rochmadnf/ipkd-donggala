<?php

namespace App\Http\Controllers;

use App\Http\Resources\UploadFileResource;
use App\Models\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

        if (request()->has('act') && (request()->get('act') === 'e-data' || request()->get('act') === 'e-file') && request()->has('id')) {
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

    protected function rules(): array
    {
        return [
            'season' => ['bail', 'required', 'digits:4', 'int', 'min:1998', 'max:2110'],
            'name' => ['bail', 'required', 'string', 'min:3'],
            'path' => ['bail', 'required', 'file', 'mimetypes:application/pdf', 'max:204800'],
            'uploaded_at' => ['bail', 'required', 'date', 'date_format:d-m-Y'],
        ];
    }

    protected function messages(): array
    {
        return [
            'path.max' => 'File maksimal 200MB',
            'path.mimetypes' => 'Berkas harus berupa PDF.',
            'uploaded_at.date_format' => 'Format tanggal unggah tidak valid. Gunakan format dd-mm-yyyy.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'uploaded_at' => 'Tanggal Unggah',
            'season' => 'Tahun',
            'name' => 'Nama Berkas',
            'path' => 'Berkas',
        ];
    }

    public function store(Request $request)
    {
        $validData = $request->validate(
            $this->rules(),
            $this->messages(),
            $this->attributes()
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

        $rules = $this->rules();

        if ($request->has('season') && $request->has('name') && $request->has('uploaded_at')) {
            $validData = $request->validate(
                Arr::except($rules, ['path']),
                $this->messages(),
                $this->attributes()
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
        } else if ($request->hasFile('path')) {
            $validData = $request->validate(
                Arr::only($rules, ['path']),
                $this->messages(),
                $this->attributes()
            );

            // delete old file
            Storage::disk('attachment')->delete($file->path);

            // store new file
            $filePath = Storage::disk('attachment')->putFileAs($file->season, $request->file('path'), $file->name . "-" . time() .  "." . $request->file('path')->getClientOriginalExtension());

            $file->update([
                'path' => $filePath,
                'uploaded_at' => $file->uploaded_at,
            ]);

            return to_route('index.file')->with('success', "Berkas {$file->name} / {$file->season} berhasil diperbarui.");
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

    public function getFilePath(Request $request)
    {
        $uuid = $request->get('uid');

        $file = UploadFile::where('uuid', $uuid)->firstOrFail();

        $filePath = Storage::disk('attachment')->url($file->path);

        return response()->json([
            'status' => 'success',
            'data' => [
                'file_path' => $filePath,
            ],
        ]);
    }
}
