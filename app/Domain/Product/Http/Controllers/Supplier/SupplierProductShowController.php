<?php


namespace Product\Http\Controllers\Supplier;


use App\Database\Models\Product;
use App\Helpers\AppResponse;
use Illuminate\Http\JsonResponse;
use Product\Http\Resources\ProductListResource;
use Product\Http\Resources\Supplier\ProductShowResource;
use Product\Services\User\Supplier\ProductShowService;

class SupplierProductShowController
{
    private ProductShowService $showService;

    public function __construct(ProductShowService $productShowService)
    {
        $this->showService = $productShowService;
    }

    public function list(): JsonResponse
    {
        $products = $this->showService->productList();

        return AppResponse::success([
            'products' => ProductListResource::collection($products),
        ]);
    }

    public function show(Product $product): JsonResponse
    {
        $product = $this->showService->productSingle($product);

        return AppResponse::success([
            'product' => ProductShowResource::make($product),
        ]);
    }
}
