<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lampiran')]
class DataPage extends Component
{
    public function render()
    {
        return view('pages.data-page');
    }
}
