<?php


namespace Product\Services\User\Admin;


use App\Database\Models\Product;
use App\Enums\ProductStatus;
use Product\Services\Status\ProductStatusService;

class AdminProductStatusService
{
    private ProductStatusService $statusService;

    public function __construct(ProductStatusService $productStatusService)
    {
        $this->statusService = $productStatusService;
    }

    public function banProduct(Product $product): Product
    {
        return $this->statusService->changeStatus($product, ProductStatus::BANNED);
    }
}
