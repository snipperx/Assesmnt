<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'slug',
        'images',
        'is_active'
    ];

    /**
     * @return BelongsToMany
     */
    public function  categories(): BelongsToMany
    {
        return $this->belongstoMany(Category::class);
    }

    /**
     * @return HasMany
     */
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public static function getIdBySlug($slug){
        if ($product = Product::select('id')
            ->where('slug', $slug)
            ->first()) {
            return $product->id;
        }
        return 0;
    }

}
