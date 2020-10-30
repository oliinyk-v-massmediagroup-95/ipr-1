<?php

namespace App\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Database\Product\ProductStatus
 *
 * @property int $id
 * @property string $name
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Database\Product\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStatus whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductStatus extends Model
{
    use HasFactory;

    protected $table = 'product_statuses';

    protected $fillable = [
        'name',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
