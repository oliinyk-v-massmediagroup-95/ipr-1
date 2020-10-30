<?php

namespace App\Http\Controllers\User\Product;

use App\Database\Models\Product;
use App\Domain\Product\Services\User\ClientProductService;
use App\Helpers\AppResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientProductController extends Controller
{
    private ClientProductService $productService;

    public function __construct(ClientProductService $clientProductService)
    {
        $this->productService = $clientProductService;
    }

    public function confirmProduct(Product $product): JsonResponse
    {
        $this->productService->productConfirm($product);

        return AppResponse::success();
    }
}
