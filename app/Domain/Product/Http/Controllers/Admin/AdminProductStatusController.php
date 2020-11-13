<?php

namespace Product\Http\Controllers\Admin;


use App\Database\Models\Product;
use App\Enums\ProductStatus;
use App\Helpers\AppResponse;
use Illuminate\Http\JsonResponse;
use Product\Services\User\Admin\AdminStatusService;

class AdminProductStatusController
{
    private AdminStatusService $adminStatusService;

    public function __construct(AdminStatusService $statusService)
    {
        $this->adminStatusService = $statusService;
    }

    public function banProduct(Product $product): JsonResponse
    {
        $product = $this->adminStatusService->banProduct($product);

        return AppResponse::success([
            'product' => $product,
        ]);
    }
}
