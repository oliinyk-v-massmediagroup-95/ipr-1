<?php


namespace Product\Http\Controllers\Supplier;


use App\Database\Models\Product;
use App\Helpers\AppResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Product\Services\User\Supplier\ProductOperationService;

class SupplierProductOperationController
{
    private ProductOperationService $productOperationService;

    public function __construct(ProductOperationService $productOperationService)
    {
        $this->productOperationService = $productOperationService;
    }

    public function create(): JsonResponse
    {
        $this->productOperationService->showCreate();

        return AppResponse::success();
    }

    public function store(Request $request): JsonResponse
    {
        $this->productOperationService->createProduct($request->all());

        return AppResponse::success();
    }

    public function edit(Product $product): JsonResponse
    {
        $this->productOperationService->showEdit($product);

        return AppResponse::success();
    }

    public function update(Request $request, Product $product): JsonResponse
    {
        $this->productOperationService->updateProduct($product, $request->all());

        return AppResponse::success();
    }

    public function delete(Product $product): JsonResponse
    {
        $this->productOperationService->deleteProduct($product);

        return AppResponse::success();
    }
}
