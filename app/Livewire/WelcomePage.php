<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Beranda')]
class WelcomePage extends Component
{
    public function render()
    {
        return view('pages.welcome-page');
    }
}
