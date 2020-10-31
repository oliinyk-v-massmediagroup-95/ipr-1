<?php

namespace App\Domain\Product\Interfaces;

use AppModels\Product;
use Illuminate\Support\Collection;

interface ProductShowInterface
{
    public function productList(): Collection;

    public function productSingle(int $productId): Product;
}
