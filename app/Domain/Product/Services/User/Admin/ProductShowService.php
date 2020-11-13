<?php

namespace Product\Services\User\Admin;

use App\Database\Models\Product;
use App\Database\Queries\ProductQueries;
use App\Enums\ProductStatus;
use Illuminate\Support\Collection;

class ProductShowService
{
    private ProductQueries $productQueries;

    public function __construct(ProductQueries $productQueries)
    {
        $this->productQueries = $productQueries;
    }

    public function productList(): Collection
    {
        return $this->productQueries->allOriginalWith(['status', 'user']);
    }

    public function productSingle(Product $product): Product
    {
        return $this->productQueries->load($product, ['user', 'status', 'original', 'versions']);
    }
}
