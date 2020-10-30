<?php

namespace App\Domain\Product\Factories;

use App\Database\Models\User;
use App\Domain\Product\Interfaces\ProductShowInterface;
use App\Domain\Product\Services\User\AdminProductService;
use App\Domain\Product\Services\User\ClientProductService;
use App\Domain\Product\Services\User\SupplierProductService;
use App\Enums\Role;

class ProductShowFactory
{
    private const SERVICES = [
        Role::ADMIN => AdminProductService::class,
        Role::SUPPLIER => SupplierProductService::class,
        Role::CLIENT => ClientProductService::class,
    ];

    public function getService(User $user): ProductShowInterface
    {
        try {
            return resolve(self::SERVICES[$user->role]);
        } catch (\Exception $e) {
            throw new \Exception('User dont have access');
        }
    }
}
