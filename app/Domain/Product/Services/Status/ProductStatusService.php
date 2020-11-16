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

    public function __construct(ProductStatusQueries $productStatusQueries, ProductQueries $productQueries)
    {
        $this->productStatusQueries = $productStatusQueries;
        $this->productQueries = $productQueries;
    }

    public function changeStatus(Product $product, string $status): Product
    {
        if (!in_array($status, self::AVAILABLE_STATUSES, true)) {
            throw new LogicException('Undefined status');
        }

        if($product->isNotOriginal()) {
            throw new LogicException("Can't change status in not original record");
        }


        $this->createProductVersion($product);

        return $this->createNewStatus($product, $status);
    }

    private function createNewStatus(Product $product, string $status): Product
    {
        $this->productStatusQueries->create($product->id, $status);

        return $this->productQueries->load($product, ['status']);
    }

    private function createProductVersion(Product $product): void
    {
        $productReplicate = $product->replicate()->toArray();
        $productReplicate['original_product_id'] = $product->id;

        $productVersion = $this->productQueries->create($productReplicate);

        $oldStatus = $this->productQueries->load($product, ['status'])->status;

        if (!isset($oldStatus)) {
            throw new LogicException('this product dont have status');
        }

        $this->productStatusQueries->create($productVersion->id, $oldStatus->name);
    }
}
