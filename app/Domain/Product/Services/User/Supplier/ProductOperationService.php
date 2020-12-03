<?php

namespace Product\Services\User\Supplier;

use App\Database\Models\Product;
use App\Database\Models\User;
use App\Database\Queries\ProductQueries;
use App\Enums\ProductStatus;
use App\Helpers\AppData;
use App\Helpers\Proxy\AuthProxy;
use Illuminate\Http\UploadedFile;
use LogicException;
use Product\Services\ProductFileService;
use Product\Services\Status\ProductStatusService;

class ProductOperationService
{
    private ProductQueries $productQueries;
    private ProductStatusService $statusService;
    private ProductFileService $fileService;

    public function __construct(
        ProductQueries $productQueries,
        ProductStatusService $productStatusService,
        ProductFileService $productFileService
    )
    {
        $this->fileService = $productFileService;
        $this->productQueries = $productQueries;
        $this->statusService = $productStatusService;
    }

    public function createProduct(array $productData, User $user, ?UploadedFile $file): Product
    {
        $productData['user_id'] = $user->id;
        $productData['original_product_id'] = null;

        $product = $this->productQueries->create($productData);

        $path = isset($file)
            ? $this->fileService->saveFile($file, $product) :
            AppData::NOT_FOUND_IMAGE;

        $this->productQueries->update($product, ['img' => $path]);

        $this->statusService->changeStatus($product, ProductStatus::CREATED);

        return $product;
    }

    public function deleteProduct(Product $product): void
    {
        $product = $this->productQueries->load($product, ['status']);

        if ($product->status->name === ProductStatus::BANNED) {
            throw new LogicException("You can't delete banned product");
        }

        $this->statusService->changeStatus($product, ProductStatus::DELETED);
    }

    public function getProduct(Product $product): Product
    {
        return $product;
    }

    public function updateProduct(Product $product, array $productData, ?UploadedFile $file): Product
    {
        $this->statusService->changeStatus($product, ProductStatus::DELETED);

        $product = $this->productQueries->update($product, $productData);

        if (isset($file)) {
            $path = $this->fileService->saveFile($file, $product);
            $this->productQueries->update($product, ['img' => $path]);
        }

        return $product;
    }
}
