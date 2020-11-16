<?php

namespace App\Database\Queries;

use Illuminate\Support\Collection;
use App\Database\Models\Product;

class ProductQueries
{
    public function allOriginalWith(array $with = []): Collection
    {
        return Product::query()->onlyOriginal()->with($with)->get();
    }

    public function allOriginalByProductsId(array $productsId): Collection
    {
        return Product::query()->onlyOriginal()->whereIn('id', $productsId)->get();
    }

    public function allOriginalByUserIdWith(int $userId, array $with = []): Collection
    {
        return Product::query()->onlyOriginal()->where('user_id', $userId)->with($with)->get();
    }

    public function findByIdAndUserId(int $productId, int $userId): ?Product
    {
        return Product::query()->where('id', $productId)->where('user_id', $userId)->first();
    }

    public function load(Product $product, array $load): Product
    {
        $product->load($load);

        return $product;
    }

    public function allByUserIdWhereNotStatus(int $userId, string $statusName): Collection
    {
        return Product::query()
            ->where('user_id', $userId)
            ->onlyOriginal()
            ->with(['status'])
            ->whereDoesntHave('status', function ($query) use ($statusName) {
                return $query->where('name', $statusName);
            })
            ->get();
    }

    public function loadMany(Collection $products, string $load): Collection
    {
        $products->load($load);

        return $products;
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
