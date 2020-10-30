<?php

namespace App\Domain\Product\Managers;

use App\Database\Models\Product;
use App\Database\Models\User;
use App\Domain\Product\Factories\ProductOperationFactory;

class ProductOperationManager
{
    private ProductOperationFactory $operationFactory;

    public function __construct(ProductOperationFactory $operationFactory)
    {
        $this->operationFactory = $operationFactory;
    }

    public function showCreate(User $user): void
    {
        $this->operationFactory->getService($user)->showCreate($user);
    }

    public function createProduct(User $user, array $productData): Product
    {
        return $this->operationFactory->getService($user)->createProduct($user, $productData);
    }

    public function showEdit(User $user, Product $product): Product
    {
        return $this->operationFactory->getService($user)->showEdit($product);
    }

    public function updateProduct(User $user, Product $product, array $productData): Product
    {
        return $this->operationFactory->getService($user)->updateProduct($user, $product, $productData);
    }

    public function deleteProduct(User $user, Product $product): void
    {
        $this->operationFactory->getService($user)->deleteProduct($user, $product);
    }
}
