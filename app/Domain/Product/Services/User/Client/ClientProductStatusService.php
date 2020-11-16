<?php


namespace Product\Services\User\Client;


use App\Database\Models\Product;
use App\Enums\ProductStatus;
use Product\Services\Status\ProductStatusService;

class ClientProductStatusService
{
    private ProductStatusService $statusService;

    public function __construct(ProductStatusService $productStatusService)
    {
        $this->statusService = $productStatusService;
    }

    public function confirmProduct(Product $product): Product
    {
        return $this->statusService->changeStatus($product, ProductStatus::CONFIRMED);
    }
}
