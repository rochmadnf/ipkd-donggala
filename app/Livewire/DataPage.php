<?php

namespace App\Livewire;

use App\Models\UploadFile;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lampiran')]
class DataPage extends Component
{
    public function render()
    {
        $uploadedFiles = UploadFile::orderBy('sequence', 'ASC')->get();
        return view('pages.data-page', compact('uploadedFiles'));
    }
}
