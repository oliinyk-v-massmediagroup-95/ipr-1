<?php

namespace App\Domain\Product\Interfaces;

use App\Database\Models\Product;
use Illuminate\Support\Collection;

interface ProductShowInterface
{
    public function productList(): Collection;

    public function productSingle(int $productId): Product;
}
