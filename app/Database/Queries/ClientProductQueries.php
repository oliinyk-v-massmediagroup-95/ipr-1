<?php

namespace App\Database\Queries;

use App\Database\Models\ClientProduct;
use Illuminate\Support\Collection;

class ClientProductQueries
{
    public function allByUserId(int $userId): Collection
    {
        return ClientProduct::where('user_id', $userId)->get();
    }
}
