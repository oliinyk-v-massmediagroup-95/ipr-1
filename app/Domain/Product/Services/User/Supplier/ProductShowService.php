<?php


namespace Product\Services\User\Supplier;


use App\Database\Models\Product;
use App\Database\Queries\ProductQueries;
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
//        $this->productQueries->
    }

    public function productSingle(Product $product): Product
    {
        // TODO: Implement single() method.
    }
}
