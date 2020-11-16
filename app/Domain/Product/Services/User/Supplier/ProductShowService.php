<?php


namespace Product\Services\User\Supplier;


use App\Database\Models\Product;
use App\Database\Queries\ProductQueries;
use App\Enums\ProductStatus;
use App\Helpers\Proxy\AuthProxy;
use Illuminate\Support\Collection;
use LogicException;

class ProductShowService
{
    private ProductQueries $productQueries;
    private AuthProxy $auth;

    public function __construct(ProductQueries $productQueries, AuthProxy $auth)
    {
        $this->productQueries = $productQueries;
        $this->auth = $auth;
    }

    public function productList(): Collection
    {
        $user = $this->auth->user();

        return $this->productQueries->allByUserIdWhereNotStatus(
            $user->id,
            ProductStatus::DELETED
        );
    }

    public function productSingle(Product $product): Product
    {
        $user = $this->auth->user();

        $product = $this->productQueries->load($product, ['status', 'user']);

        if($product->isNotOriginal()) {
            throw new LogicException('Invalid ID');
        }

        if($product->user_id !== $user->id) {
            throw new LogicException("Don't have access");
        }

        if($product->status->name === ProductStatus::DELETED) {
            throw new LogicException("Try to access deleted product");
        }

        return $product;
    }
}
