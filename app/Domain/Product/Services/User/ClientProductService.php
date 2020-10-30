<?php

namespace App\Domain\Product\Services\User;

use App\Database\Models\Product;
use App\Database\Queries\ProductQueries;
use App\Domain\Product\Interfaces\ProductShowInterface;
use Illuminate\Support\Collection;

class ClientProductService implements ProductShowInterface
{
    private ProductQueries $productQueries;

    public function __construct(ProductQueries $productQueries)
    {
        $this->productQueries = $productQueries;
    }

    public function productList(): Collection
    {

    }

    public function productSingle(int $productId): Product
    {
        // TODO: Implement single() method.
    }

    public function productConfirm(Product $product)
    {

    }
}
