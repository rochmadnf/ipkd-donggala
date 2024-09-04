<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UploadFileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'filename' => $this->name,
            'filepath' => $this->path,
            'uploaded_at' => $this->uploaded_at,
            'order' => $this->sequence
        ];
    }
}
