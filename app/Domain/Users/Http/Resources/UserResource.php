<?php

namespace Users\Http\Resources;

use App\Database\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        /**
         * Transform the resource into an array.
         *
         * @var User $this
         *
         */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'createdAt' => $this->created_at->format('Y.m.d H:i:s'),
        ];
    }
}
