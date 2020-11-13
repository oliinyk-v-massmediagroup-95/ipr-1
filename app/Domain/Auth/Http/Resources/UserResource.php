<?php

namespace Auth\Http\Resources;

use App\Database\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Users\Http\Resources\UserResource as UserModuleResource;

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

        return UserModuleResource::make($this);
    }
}
