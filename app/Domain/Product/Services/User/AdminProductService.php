<?php

namespace App\Domain\Product\Services\User;

use App\Database\Models\Product;
use App\Database\Models\User;
use App\Database\Queries\ProductQueries;
use App\Domain\Product\Interfaces\ProductShowInterface;
use App\Domain\Services\ProductStatusService;
use App\Enums\ProductStatus;
use App\Enums\Role;
use Illuminate\Support\Collection;

class AdminProductService implements ProductShowInterface
{
    private ProductQueries $productQueries;
    private ProductStatusService $productStatusService;

    public function __construct(ProductQueries $productQueries)
    {
        $this->productQueries = $productQueries;
    }

    public function productList(): Collection
    {
        return $this->productQueries->allOriginal();
    }

    public function productSingle(int $originalProductId): Product
    {
        $product = $this->productQueries->findById($originalProductId);

        return $this->productQueries->load($product, ['status', 'original', 'versions']);
    }

    public function productBan(Product $product): Product
    {
        return $this->productStatusService->changeStatus($product, ProductStatus::BANNED);
    }
}
