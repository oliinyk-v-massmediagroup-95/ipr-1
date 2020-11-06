<?php

namespace App\Domain\Product\Services\User;

use App\Database\Models\Product;
use App\Database\Models\User;
use App\Database\Queries\ProductQueries;
use App\Domain\Product\Interfaces\ProductOperationInterface;
use App\Domain\Product\Interfaces\ProductShowInterface;
use Illuminate\Support\Collection;

class SupplierProductService implements ProductShowInterface
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

    public function showCreate(): void
    {
        // TODO: Implement showCreate() method.
    }

    public function createProduct(array $productData): Product
    {
        // TODO: Implement createProduct() method.
    }

    public function deleteProduct(Product $product): void
    {
        // TODO: Implement deleteProduct() method.
    }

    public function showEdit(Product $product): Product
    {
        // TODO: Implement showEdit() method.
    }

    public function updateProduct(Product $product, array $productData): Product
    {
        // TODO: Implement updateProduct() method.
    }
}
