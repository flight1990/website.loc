<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GenerateMenuResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url'  => $this->url(),
            'is_active' => $this->isActive,
            'children' => GenerateMenuResource::collection($this->children())
        ];
    }
}
