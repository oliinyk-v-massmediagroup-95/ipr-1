<?php

namespace App\Domain\Product\Interfaces;

use App\Database\Models\Product;
use App\Database\Models\User;

interface ProductOperationInterface
{
    public function showCreate(User $user): void;

    public function createProduct(User $user, array $productData): Product;

    public function showEdit(Product $product): Product;

    public function updateProduct(User $user, Product $product, array $productData): Product;

    public function deleteProduct(User $user, Product $product): void;
}
