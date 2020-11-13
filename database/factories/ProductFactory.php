<?php

namespace Database\Factories;

use App\Database\Models\Product;
use App\Database\Models\ProductStatus;
use App\Database\Models\User;
use App\Enums\ProductStatus as ProductStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::query()->select(['id'])->inRandomOrder()->first();
        $images = [
            'https://elcopcbonline.com/photos/product/4/176/4.jpg',
            'https://cdn.shopify.com/s/files/1/0070/7032/files/camera_56f176e3-ad83-4ff8-82d8-d53d71b6e0fe.jpg?v=1527089512',
            'https://cdn.pixabay.com/photo/2020/05/26/09/32/product-5222398_960_720.jpg',
            'https://www.apple.com/v/product-red/o/images/meta/og__dbjwy50zuc02.png?202010140437',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSF_Sqhw1PD5zhKrr_vxgqAuQxd5Eiwt4hIHA&usqp=CAU',
            'https://imgprd19.hobbylobby.com/9/5f/26/95f264323ae49e65b2a53a909fcd7d9ee659f3c7/350Wx350H-422519-0320.jpg',
            'https://brain-images-ssl.cdn.dixons.com/4/2/10199624/u_10199624.jpg',
        ];

        return [
            'title' => $this->faker->word(),
            'user_id' => $user ? $user->id : 0,
            'cost' => $this->faker->randomFloat(2, 0, 10000),
            'weight' => $this->faker->randomFloat(2, 0, 50),
            'sizes' => $this->faker->numberBetween(1, 1000). 'x'. $this->faker->numberBetween(1, 1000),
            'img' => $images[$this->faker->numberBetween(0, count($images) - 1)],
            'description' => $this->faker->paragraph( 4),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            ProductStatus::factory([
                'name' => ProductStatusEnum::CREATED,
                'product_id' => $product->id,
            ])->create();
        });
    }
}
