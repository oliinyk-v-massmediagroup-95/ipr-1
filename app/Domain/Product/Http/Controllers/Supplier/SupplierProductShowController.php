<?php


namespace Product\Http\Controllers\Supplier;


use App\Database\Models\Product;
use App\Helpers\AppResponse;
use App\Helpers\Proxy\AuthProxy;
use Illuminate\Http\JsonResponse;
use Product\Http\Resources\ProductResource;
use Product\Services\User\Supplier\ProductShowService;

class SupplierProductShowController
{
    private ProductShowService $showService;
    private AuthProxy $authProxy;

    public function __construct(ProductShowService $productShowService, AuthProxy $authProxy)
    {
        $this->showService = $productShowService;
        $this->authProxy = $authProxy;
    }

    public function list(): JsonResponse
    {
        $products = $this->showService->productList($this->authProxy->user());

        return AppResponse::success([
            'products' => ProductResource::collection($products),
        ]);
    }

    public function show(Product $product): JsonResponse
    {
        $user = $this->authProxy->user();
        $product = $this->showService->productSingle(
            $product,
            $user
        );

        return AppResponse::success([
            'product' => ProductResource::make($product),
            'user' => $user
        ]);
    }
}
