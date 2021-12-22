<?php


namespace App\Service;


use http\Client\Request;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class Upload
{

    public function handleUploadedImage($image, $store_path)
    {
        if ($image->isValid()) {
            $extension = $image->extension();
            $safeName = time(). '.' . $extension;
            $image->move($store_path, $safeName);
            return $safeName;
        } else {
            throw new UploadException("Uploaded file is not valid.");
        }
    }

}
