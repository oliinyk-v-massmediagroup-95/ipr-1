<?php

namespace App\Http\Controllers\User\Product;

use App\Database\Models\Product;
use App\Domain\Product\Services\User\AdminProductService;
use App\Helpers\AppResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    private AdminProductService $productService;

    public function __construct(AdminProductService $productService)
    {
        $this->productService = $productService;
    }

    public function banProduct(Product $product): JsonResponse
    {
        $this->productService->productBan($product);

        return AppResponse::success();
    }
}
