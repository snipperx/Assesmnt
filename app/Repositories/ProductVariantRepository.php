<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductVariant;

class ProductVariantRepository implements ProductVariantInterface
{

    public function getAll()
    {
        return ProductVariant::getAllVariants();
    }

    public function getById($id)
    {
        $id = Product::getIdBySlug($id);
        $query = Product::findOrFail($id);
//        $product = $query->with('categories')->get();
        return  ProductVariant::getVariantsById($query['id']);
    }

    public function delete($id)
    {
        $variant = ProductVariant::find($id);
        return $variant->delete();
    }

    public function create(array $data)
    {
        return ProductVariant::create($data);
    }

    public function update($id, array $data)
    {
        $variant = ProductVariant::findOrFail($id);
        return $variant->update($data);
    }

    public function getIdBySlug($slug)
    {
        // TODO: Implement getIdBySlug() method.
    }
}
