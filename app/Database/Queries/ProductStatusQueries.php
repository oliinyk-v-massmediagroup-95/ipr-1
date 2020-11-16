<?php


namespace App\Database\Queries;


use App\Database\Models\Product;
use App\Database\Models\ProductStatus;

class ProductStatusQueries
{
    public function create(int $productId, string $name): ProductStatus
    {
        return ProductStatus::create([
            'product_id' => $productId,
            'name' => $name
        ]);
    }
}
