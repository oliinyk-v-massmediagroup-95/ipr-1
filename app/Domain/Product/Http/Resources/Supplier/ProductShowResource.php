<?php

namespace Product\Http\Resources\Supplier;

use App\Database\Models\Product;
use App\Database\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
{
    public function toArray($request)
    {
        /**
         * Transform the resource into an array.
         *
         * @var Product $this
         *
         */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
        ];
    }
}
