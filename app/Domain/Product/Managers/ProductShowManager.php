<?php

namespace App\Domain\Product\Managers;

use App\Database\Models\Product;
use App\Database\Models\User;
use App\Domain\Product\Factories\ProductShowFactory;
use Illuminate\Support\Collection;

class ProductShowManager
{
    private ProductShowFactory $showFactory;

    public function __construct(ProductShowFactory $showFactory)
    {
        $this->showFactory = $showFactory;
    }

    public function productList(User $user): Collection
    {
        return $this->showFactory->getService($user)->productList();
    }

    public function productSingle(User $user, int $productId): Product
    {
        return $this->showFactory->getService($user)->productSingle($productId);
    }
}
