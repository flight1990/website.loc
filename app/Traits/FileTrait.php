<?php

namespace App\Traits;

use Image;
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

        if ( in_array($file->getClientOriginalExtension(), ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'])) {
            $location['original']  = Storage::url($serverName);
            $location['thumbnail']  = $this->resizeImg($file, $location['original']);
        } else {
            $location  = Storage::url($serverName);
        }

        return [
            'originalName' => $originalName,
            'size' => $size,
            'extension' => $extension,
            'location' => $location
        ];
    }

    public function resizeImg($file, $location)
    {
        $temp = explode('/', $location);

        $fileName = array_pop($temp);

        $filePath = array_slice($temp, 2, 2);
        $filePath[] = 'thumbnails';
        $filePath = implode('/', $filePath);

        $resizedFilePath = $filePath.'/'.$fileName;

        $resized = Image::make($file->getRealPath())
            ->resize(720, 480, function($constraint){
                $constraint->aspectRatio();
            })->stream();


        Storage::disk('public')->put($resizedFilePath, $resized->__toString());

        return '/storage/'.$resizedFilePath;
    }

    public function delete($path): void
    {
        Storage::disk('public')->delete(Str::remove('/storage', $path));
    }
}
