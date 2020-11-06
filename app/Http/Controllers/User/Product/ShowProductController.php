<?php

namespace App\Http\Controllers\User\Product;

use App\Database\Models\Product;
use App\Database\Models\User;
use App\Domain\Product\Factories\ProductShowFactory;
use App\Domain\Product\Interfaces\ProductShowInterface;
use App\Domain\Product\Managers\ProductShowManager;
use App\Helpers\Proxy\AuthProxy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    private ProductShowInterface $productService;

    public function __construct(ProductShowFactory $productShowFactory, AuthProxy $auth)
    {
        $this->productService = $productShowFactory->getService($auth->user());
    }

    public function list()
    {
        $this->productService->productList();
    }

    public function single(Product $product)
    {
        $this->productService->productSingle($product->id);
    }
}
