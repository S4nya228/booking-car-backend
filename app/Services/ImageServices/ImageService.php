<?php

namespace App\Services\ImageServices;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ImageService
{
    public function validationData($request)
    {
        $validatedData = $request->validated();

        if ($request->has('image_path')) {
            $validatedData['image_path'] = $this->processingImageInput($request);
        }
        
        return $validatedData;
    }

    private function processingImageInput($request): string
    {
        $images = $this->getImageFromRequest($request);

        $imagePathString = $this->storeImage($images);

        return $imagePathString;
    }

    public function getImage($fileName): array
    {
        if (!Storage::exists("public/images/$fileName")) {
            return response()->json(['error' => 'Image not found'], Response::HTTP_NOT_FOUND);
        }

        $file = Storage::get("public/images/$fileName");

        $type = Storage::mimeType("public/images/$fileName");

        return [$file, $type];
    }

    public function convertImagesToArray($imagePath): array
    {
        return explode(',', $imagePath);
    }

    private function getImageFromRequest($request): array
    {
        $images = $request->file('image_path');

        return $images;
    }

    private function storeImage($images): string
    {
        $imagePath = array_map(fn ($image) => str_replace('public/images/', '', $image->store('public/images')), $images);
        return join(',', $imagePath);
    }
}
