<?php

namespace App\Domain\Product\Services;

use App\Database\Models\Product;
use App\Database\Queries\ProductQueries;
use App\Database\Queries\ProductStatusQueries;
use App\Domain\Product\AbstractClasses\AbstractProductStatus;
use App\Domain\Product\Services\Status\BannedStatusService;
use App\Domain\Product\Services\Status\ConfirmedStatusService;
use App\Domain\Product\Services\Status\CreatedStatusService;
use App\Domain\Product\Services\Status\DeletedStatusService;
use App\Domain\Product\Services\Status\ExpiredStatusService;
use App\Domain\Product\Services\UpdatedStatusService;
use App\Enums\ProductStatus;

class ProductStatusService
{
    private ProductStatusQueries $productStatusQueries;
    private ProductQueries $productQueries;

    private const STATUS_SERVICES = [
        ProductStatus::CREATED => CreatedStatusService::class,
        ProductStatus::UPDATED => UpdatedStatusService::class,
        ProductStatus::DELETED => DeletedStatusService::class,
        ProductStatus::BANNED => BannedStatusService::class,
        ProductStatus::CONFIRMED => ConfirmedStatusService::class,
        ProductStatus::EXPIRED => ExpiredStatusService::class,
    ];

    public function __construct(ProductStatusQueries $productStatusQueries)
    {
        $this->productStatusQueries = $productStatusQueries;
    }

    private function getServiceClass(string $status): AbstractProductStatus
    {
        try {
            return resolve(self::STATUS_SERVICES[$status]);
        } catch (\Exception $e) {
            throw new \Exception("Status " . $status . " don't exist");
        }
    }

    public function changeStatus(Product $product, string $status): Product
    {
        $serviceClass = $this->getServiceClass($status);

        $serviceClass->before($product, $status);

        $productStatus = $this->productStatusQueries->create($product->id, $status);
        $product = $this->productQueries->load($product, ['status']);

        $serviceClass->after($product, $productStatus, $status);

        return $product;
    }
}
