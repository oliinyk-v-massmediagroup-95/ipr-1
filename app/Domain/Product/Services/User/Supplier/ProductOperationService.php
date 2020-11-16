<?php

namespace Product\Services\User\Supplier;

use App\Database\Models\Product;
use App\Database\Queries\ProductQueries;
use App\Enums\ProductStatus;
use App\Helpers\Proxy\AuthProxy;
use LogicException;
use Product\Services\Status\ProductStatusService;

class ProductOperationService
{
    private ProductQueries $productQueries;
    private ProductStatusService $statusService;
    private AuthProxy $auth;

    public function __construct(
        ProductQueries $productQueries,
        ProductStatusService $productStatusService,
        AuthProxy $auth
    )
    {
        $this->auth = $auth;
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
       $product = $this->productQueries->load($product, ['status']);

       if($product->status->name === ProductStatus::BANNED) {
           throw new LogicException("You can't delete banned product");
       }

       $this->statusService->changeStatus($product, ProductStatus::DELETED);
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
