<?php

use Illuminate\Support\Str;

function sanitize_protocol($url): string
{
    return Str::replace(['https://', 'http://'], '', $url);
}
