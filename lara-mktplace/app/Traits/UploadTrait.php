<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait
{
    private function uploadImages($images, $imageColumn = null)
    {

        $uploadImages = [];

        if(is_array($images)) {
            foreach ($images as $image) {
                $uploadImages[] = [
                    $imageColumn => $image->store('product', 'public')
                ];
            }
        } else {
            $uploadImages = $images->store('logo', 'public');
        }


        return $uploadImages;
    }
}
