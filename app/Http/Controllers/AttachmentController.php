<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AttachmentController extends Controller
{
    public function index(): View
    {
        return view('pages.attachments');
    }
}
