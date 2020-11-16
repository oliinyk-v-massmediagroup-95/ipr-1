<?php

namespace Product\Http\Resources\Admin;

use App\Database\Models\Product;
use App\Database\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Product\Http\Resources\ProductListResource;
use Product\Http\Resources\ProductStatusResource;
use Product\Http\Resources\UserResource;

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
            'title' => $this->title,
            'sizes' => $this->sizes,
            'cost' => $this->cost . " €",
            'weight' => $this->weight . " kg",
            'img' => $this->img,
            'isOriginal' => $this->isOriginal(),
            'statusName' => $this->status ? $this->status->name : '(Status not found)',
            'userName' => $this->user ? $this->user->name : '(User not found)',
            'original' => $this->original
                ? ProductListResource::make($this->original)
                : null,
            'versions' => $this->versions
                ? ProductListResource::collection($this->versions)
                : [],
            'status' => $this->status
                ? ProductStatusResource::make($this->status)
                : null,
        ];
    }
}
