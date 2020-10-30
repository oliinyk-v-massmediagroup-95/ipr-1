<?php

namespace App\Database\Queries;

use Illuminate\Support\Collection;
use App\Database\Models\Product;

class ProductQueries
{
    public function allOriginal(): Collection
    {
        return Product::query()->onlyOriginal()->get();
    }

    public function allOriginalByProductsId(array $productsId): Collection
    {
        return Product::query()->onlyOriginal()->whereIn('id', $productsId)->get();
    }

    public function allOriginalByUserId(int $userId): Collection
    {
        return Product::query()->onlyOriginal()->where('user_id', $userId)->get();
    }

    public function findById(int $productId): ?Product
    {
        return Product::query()->where('id', $productId)->first();
    }

    public function load(Product $product, array $load): Product
    {
        $product->load($load);

        return $product;
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);

        return $product;
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}
