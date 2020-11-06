<?php

namespace App\Http\Controllers\User\Product;

use App\Database\Models\Product;
use App\Database\Models\User;
use App\Domain\Product\Managers\ProductOperationManager;
use App\Domain\Product\Managers\ProductShowManager;
use App\Domain\Product\Services\User\SupplierProductService;
use App\Helpers\AppResponse;
use App\Helpers\Proxy\AuthProxy;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SupplierProductController extends Controller
{
    private User $user;
    private SupplierProductService $productService;

    public function __construct(SupplierProductService $productService, AuthProxy $auth)
    {
        $this->productService = $productService;
    }

    public function create(): JsonResponse
    {
        $this->productService->showCreate($this->user);

        return AppResponse::success();
    }

    public function store(Request $request): JsonResponse
    {
        $this->productService->createProduct($request->all());

        return AppResponse::success();
    }

    public function edit(Product $product): JsonResponse
    {
        $this->productService->showEdit($product);

        return AppResponse::success();
    }

    public function update(Request $request, Product $product): JsonResponse
    {
        $this->productService->updateProduct($product, $request->all());

        return AppResponse::success();
    }

    public function delete(Product $product): JsonResponse
    {
        $this->productService->deleteProduct($product);

        return AppResponse::success();
    }
}
