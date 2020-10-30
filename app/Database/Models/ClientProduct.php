<?php

namespace App\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Database\ClientProduct\ClientProduct
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ClientProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientProduct whereUserId($value)
 * @mixin \Eloquent
 */
class ClientProduct extends Model
{
    use HasFactory;

    protected $table = 'client_products';

    protected $guarded = [];
}
