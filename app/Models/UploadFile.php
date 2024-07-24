<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadFile extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected function casts()
    {
        return [
            'uploaded_at' => 'datetime'
        ];
    }

    protected $fillable = ['name', 'path', 'season', 'sequence', 'uploaded_at'];

    // hasUUIDs
    public function uniqueIds(): array
    {
        return ['uuid'];
    }
}
