<?php

namespace Product\Http\Controllers\Client;

use App\Database\Models\Product;
use App\Domain\Product\Services\Status\ProductStatusService;
use App\Enums\ProductStatus;
use App\Helpers\AppResponse;
use Illuminate\Http\JsonResponse;
use Product\Http\Resources\Client\ProductShowResource;
use Product\Services\User\Client\ClientProductStatusService;
use Product\Services\User\ProductShowService;

class ClientProductStatusController
{
    private ClientProductStatusService $clientStatusService;

    public function __construct(ClientProductStatusService $clientProductService)
    {
        $this->clientStatusService = $clientProductService;
    }

    public function confirmProduct(Product $product): JsonResponse
    {
        $product = $this->clientStatusService->confirmProduct($product);

        return AppResponse::success([
            'product' => ProductShowResource::make($product),
        ]);
    }
}
