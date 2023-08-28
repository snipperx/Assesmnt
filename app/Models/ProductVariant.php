<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variant';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'product_id',
        'sap_product_code',
        'web_product_code',
        'is_active'
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function getAllVariants(){
        $query = ProductVariant::all();
        return $query->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'product_id' => $item->product_id,
                'sap_product_code' => $item->sap_product_code,
                'web_product_code' => $item->web_product_code
            ];
        });
    }

    public static function getVariantsById($id){

        $query = ProductVariant::with('product')
            ->where('product_id',$id)
            ->get();

        $q =  Product::where('id', $id)->with('categories')
            ->first();

        $name = '';
        foreach ($q->categories as $cat){
//            dd($cat);
            $name = $cat->slug;
        }

        return $query->map(function ($item) use ($name) {

            return [
                'id' => $item->id,
                'name' => $item->name,
                'product_id' => $item->product_id,
                'sap_product_code' => $item->sap_product_code,
                'web_product_code' => $item->web_product_code,
                'previous_id' => $name
            ];
        });
    }

    public static function getPreviousId($id){
        $q =  Product::where('id', $id)
            ->with('categories')
            ->first();

        $name = '';
        foreach ($q->categories as $cat){
//            dd($cat);
            $name = $cat->slug;
        }
        return $name;
    }


}
