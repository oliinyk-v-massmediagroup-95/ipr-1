<?php

namespace App\Domain\Product\AbstractClasses;

use App\Database\Models\Product;
use App\Database\Models\ProductStatus;
use App\Database\Queries\ProductStatusQueries;

abstract class AbstractProductStatus
{
    public function before(Product $product, string $status): void
    {

    }

    public function after(Product $product, ProductStatus $productStatus, string $status): void
    {

    }
}
