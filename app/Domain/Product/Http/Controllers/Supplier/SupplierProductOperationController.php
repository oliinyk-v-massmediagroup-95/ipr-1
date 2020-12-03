<?php


namespace Product\Http\Controllers\Supplier;


use App\Database\Models\Product;
use App\Helpers\AppResponse;
use App\Helpers\Proxy\AuthProxy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Product\Http\Requests\Supplier\ProductCreateRequest;
use Product\Http\Resources\ProductResource;
use Product\Http\Resources\Supplier\ProductShowResource;
use Product\Services\User\Supplier\ProductOperationService;

class SupplierProductOperationController
{
    private ProductOperationService $productOperationService;
    private AuthProxy $auth;

    public function __construct(ProductOperationService $productOperationService, AuthProxy $authProxy)
    {
        $this->productOperationService = $productOperationService;
        $this->auth = $authProxy;
    }

    public function create(ProductCreateRequest $request): JsonResponse
    {
        $this->productOperationService->createProduct(
            $request->validated(),
            $this->auth->user(),
            $request->file('img'),
        );

        return AppResponse::success();
    }

    public function edit(Product $product): JsonResponse
    {
        $product = $this->productOperationService->getProduct($product);

        return AppResponse::success([
            'product' => ProductResource::make($product)
        ]);
    }

    public function update(ProductCreateRequest $request, Product $product): JsonResponse
    {
        $this->productOperationService->updateProduct(
            $product,
            $request->validated(),
            $request->file('img')
        );

        return AppResponse::success();
    }

    public function delete(Product $product): JsonResponse
    {
        $this->productOperationService->deleteProduct($product);

        return AppResponse::success();
    }
}
