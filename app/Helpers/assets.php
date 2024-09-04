<?php

function asset_storage($path)
{
    if (config('app.env') === 'production') {
        return asset('storage/' . $path);
    } else {
        return asset($path);
    }
}
