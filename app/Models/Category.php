<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * The product that belong to the category.
     */
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }


    /**
     * @param $slug
     * @return int
     */
    public static function getIdBySlug($slug){
        if ($category = Category::select('id')->where('slug', $slug)->first()) {
            return $category->id;
        }
        return 0;
    }

    /**
     * @return mixed
     */
    public static function getAllCategories(){
        $query = Category::all();
        return $query->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'meta_title' => $item->meta_title,
                'meta_description' => $item->meta_description,
                'meta_keywords' => $item->meta_keywords,
            ];
        });
    }


}
