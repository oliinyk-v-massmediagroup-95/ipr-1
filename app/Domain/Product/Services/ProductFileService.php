<?php

namespace Product\Services;

use App\Database\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Storage;

class ProductFileService
{
    private const DISK = 'public';
    private const FOLDER = 'products';

    private function productFolderPath(Product $product): string
    {
        return self::FOLDER . '/' . $product->id;
    }

    private function generateFileName(UploadedFile $file): string
    {
        return \Str::random(5) . '__' . Carbon::now()->format('Y-m-d_H-i-s') . '__' . $file->getClientOriginalName();
    }

    public function saveFile(UploadedFile $file, Product $product): string
    {
        $folder = $this->productFolderPath($product);
        $fileName = $this->generateFileName($file);
        $content = file_get_contents($file->getRealPath());
        $path = $folder . '/' . $fileName;

        Storage::disk(self::DISK)->put($path, $content);

        return '/storage/' . $path;
    }
}
