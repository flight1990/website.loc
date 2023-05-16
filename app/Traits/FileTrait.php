<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileTrait
{
    public function upload($file, $folder = 'uploads'): array
    {
       $originalName = $file->getClientOriginalName();
       $size = $file->getSize();
       $extension = $file->getClientOriginalExtension();
       $serverName = Storage::disk('public')->put($folder, $file);
       $location  = Storage::url($serverName);

        return [
            'originalName' => $originalName,
            'size' => $size,
            'extension' => $extension,
            'location' => $location
        ];
    }

    public function delete($path): void
    {
        Storage::disk('public')->delete(Str::remove('/storage', $path));
    }
}
