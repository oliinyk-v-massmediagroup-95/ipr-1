<?php

namespace Product\Http\Resources;

use App\Database\Models\Product;
use App\Database\Models\ProductStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductStatusResource extends JsonResource
{
    public function toArray($request): array
    {
        /**
         * Transform the resource into an array.
         *
         * @var ProductStatus $this
         *
         */
        return [
            'name' => $this->name,
            'createdAt' =>$this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
