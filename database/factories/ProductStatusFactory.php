<?php

namespace Database\Factories;

use App\Database\Models\ProductStatus;
use App\Enums\ProductStatus as ProductStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ProductStatusEnum::CREATED
        ];
    }
}
