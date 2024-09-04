<?php

namespace App\Http\Controllers;

use App\Http\Resources\UploadFileResource;
use App\Models\UploadFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    protected function getLastSeason(): int
    {
        if (!is_null($lastSeason = UploadFile::orderBy('season', 'DESC')?->first()?->season)) {
            return (int) $lastSeason;
        }

        return (int) now()->format('Y');
    }

    public function index(Request $request)
    {
        $initSeason = $request->has('season') ? (int) $request->season : $this->getLastSeason();

        if ($initSeason >= 1998 && $initSeason <= (int) now()->addYears(10)->format('Y')) {
            $files = UploadFile::where('season', $initSeason)->orderBy('sequence')->get();
            return view('pages.attachments', ['files' => UploadFileResource::collection($files)->resolve(), 'initSeason' => $initSeason]);
        }

        return back();
    }
}
