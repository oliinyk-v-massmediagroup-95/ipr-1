<?php

namespace App\Database\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Static_;

/**
 * App\Database\Product\Product
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $original_product_id
 * @property string $title
 * @property float $cost
 * @property float $weight
 * @property string $sizes
 * @property string|null $img
 * @property string|null $description
 * @property-read User $user
 * @property-read ProductStatus $status
 * @property-read Collection $versions
 * @property-read Collection $statuses
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product onlyOriginal()
 * @method static \Illuminate\Database\Eloquent\Builder|Product notOriginal()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOriginalProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'original_product_id',
        'title',
        'cost',
        'weight',
        'sizes',
        'img',
        'description'
    ];

    public function isOriginal(): bool
    {
        return !isset($this->original_product_id);
    }

    public function isNotOriginal(): bool
    {
        return isset($this->original_product_id);
    }

    public function scopeOnlyOriginal(Builder $query): Builder
    {
        return $query->whereNull('original_product_id');
    }

    public function scopeNotOriginal(Builder $query): Builder
    {
        return $query->whereNotNull('original_product_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(ProductStatus::class, 'product_id')->latest();
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(ProductStatus::class, 'product_id')->latest();
    }

    public function versions(): HasMany
    {
        return $this->hasMany(self::class, 'original_product_id');
    }

    public function original(): BelongsTo
    {
        return $this->belongsTo(self::class, 'original_product_id');
    }

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}
