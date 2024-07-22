<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    use HasFactory;

    protected function casts()
    {
        return [
            'uploaded_at' => 'datetime'
        ];
    }

    protected $fillable = ['name', 'filepath', 'season_year', 'sequence', 'uploaded_at'];
}
