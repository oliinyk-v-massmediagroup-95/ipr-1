<?php

namespace Product\Http\Resources;

use App\Database\Models\Product;
use App\Database\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Product\Http\Resources\ProductListResource;
use Product\Http\Resources\ProductStatusResource;
use Product\Http\Resources\UserResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'sizes' => $this->sizes,
            'cost' => $this->cost . " €",
            'weight' => $this->weight . " kg",
            'img' => $this->img,
            'isOriginal' => $this->isOriginal(),
            'userName' => $this->user ? $this->user->name : '(User Not Found)',
            'statusName' => $this->status ? $this->status->name : '(Status not found)',
        ];
    }
}
