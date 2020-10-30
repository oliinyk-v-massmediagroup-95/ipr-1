<?php

namespace App\Domain\Product\Factories;

use App\Database\Models\User;
use App\Domain\Product\Interfaces\ProductOperationInterface;
use App\Domain\Product\Services\User\AdminProductService;
use App\Domain\Product\Services\User\ClientProductService;
use App\Domain\Product\Services\User\SupplierProductService;
use App\Enums\Role;

class ProductOperationFactory
{
    private const SERVICES = [
        Role::SUPPLIER => SupplierProductService::class,
    ];

    public function getService(User $user): ProductOperationInterface
    {
        try {
            return resolve(self::SERVICES[$user->role]);
        }
        catch (\Exception $e) {
            throw new \Exception('User dont have access');
        }
    }
}
