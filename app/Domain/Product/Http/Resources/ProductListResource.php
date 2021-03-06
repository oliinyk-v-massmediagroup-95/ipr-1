<?php

namespace Product\Http\Resources;

use App\Database\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    public function toArray($request): array
    {
        /**
         * Transform the resource into an array.
         *
         * @var Product $this
         *
         */

        if(!isset($this->id)){
            dd($this->id);
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'userName' => $this->user ? $this->user->name : 'Not Found',
            'cost' => $this->cost . " €",
            'weight' => $this->weight . " kg",
            'img' => $this->img,
            'statusName' => $this->status ? $this->status->name: 'Not Found',
            'sizes' => $this->sizes,
            'createdAt' => $this->created_at->format('Y.m.d H:i:s'),
        ];
    }
}
