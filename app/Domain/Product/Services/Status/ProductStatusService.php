<?php

namespace Product\Services\Status;

use App\Database\Models\Product;
use App\Database\Queries\ProductQueries;
use App\Database\Queries\ProductStatusQueries;
use App\Enums\ProductStatus;
use LogicException;

class ProductStatusService
{
    private ProductStatusQueries $productStatusQueries;
    private ProductQueries $productQueries;

    private const AVAILABLE_STATUSES = [
        ProductStatus::CONFIRMED,
        ProductStatus::BANNED,
        ProductStatus::CREATED,
        ProductStatus::EXPIRED,
        ProductStatus::DELETED,
        ProductStatus::UPDATED,
    ];

    public function __construct(ProductStatusQueries $productStatusQueries)
    {
        $this->productStatusQueries = $productStatusQueries;
    }

    public function changeStatus(Product $product, string $status): Product
    {
        if(!in_array($status, self::AVAILABLE_STATUSES, true)) {
            throw new LogicException('Undefined status');
        }

        $this->productStatusQueries->create($product->id, $status);

        return $this->productQueries->load($product, ['status']);
    }
}
