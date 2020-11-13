<?php

namespace Product\Services\User\Supplier;

use App\Database\Models\Product;
use App\Database\Queries\ProductQueries;
use Illuminate\Support\Collection;
use Product\Services\Status\ProductStatusService;

class ProductOperationService
{
    private ProductQueries $productQueries;
    private ProductStatusService $statusService;

    public function __construct(ProductQueries $productQueries, ProductStatusService $productStatusService)
    {
        $this->productQueries = $productQueries;
        $this->statusService = $productStatusService;
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
