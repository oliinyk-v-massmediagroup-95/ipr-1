<?php

namespace Product\Http\Controllers\Client;

use App\Database\Models\Product;
use App\Domain\Product\Services\Status\ProductStatusService;
use App\Enums\ProductStatus;
use App\Helpers\AppResponse;
use Illuminate\Http\JsonResponse;
use Product\Http\Resources\Client\ProductShowResource;
use Product\Services\User\Client\ClientStatusService;
use Product\Services\User\ProductShowService;

class ClientProductStatusController
{
    private ClientStatusService $clientStatusService;

    public function __construct(ClientStatusService $clientProductService)
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
