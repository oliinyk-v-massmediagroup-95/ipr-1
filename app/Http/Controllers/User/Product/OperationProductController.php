<?php

namespace App\Http\Controllers\User\Product;

use App\Database\Models\Product;
use App\Domain\Product\Managers\ProductOperationManager;
use App\Domain\Product\Managers\ProductShowManager;
use App\Helpers\AppResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OperationProductController extends Controller
{
    private ProductOperationManager $productManager;

    public function __construct(ProductOperationManager $operationManager)
    {
        $this->productManager = $operationManager;
    }

    public function create(Request $request): JsonResponse
    {
        $this->productManager->showCreate($request->user());

        return AppResponse::success();
    }

    public function store(Request $request): JsonResponse
    {
        $this->productManager->createProduct($request->user(), $request->all());

        return AppResponse::success();
    }

    public function edit(Request $request, Product $product): JsonResponse
    {
        $this->productManager->showEdit($request->user(), $product);

        return AppResponse::success();
    }

    public function update(Request $request, Product $product): JsonResponse
    {
        $this->productManager->updateProduct($request->user(), $product, $request->all());

        return AppResponse::success();
    }

    public function delete(Request $request, Product $product): JsonResponse
    {
        $this->productManager->deleteProduct($request->user(), $product);

        return AppResponse::success();
    }
}
