<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        $products = Product::all();
        return $products->map(function ($q) {
            return [
                'id' => $q->id,
                'name' => $q->name,
                'slug' => $q->slug,
            ];
        });
    }

    public function getProductById($slug)
    {

        $id = Category::getIdBySlug($slug);
        $category = Category::findOrFail($id);
        $collection = $category->product;

       return $collection->map(function ($item) use ($slug) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'id_slug' => $slug,
            ];
        });
    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        $product->categories()->detach();
        $product->delete();;
    }

    public function createProduct(array $productData)
    {
        $name = $productData['name'];
        $cat = $productData['category_id'];

        $product = Product::create([
            'name' => $name,
            'slug' => Str::slug($name),
        ]);

        foreach ($cat as $categoryId)
        {
            $category = Category::find($categoryId);
            $product->categories()->attach($category);
        }
//        return Product::create($productData);
    }

    public function updateProduct($productId, array $productData)
    {

        $product = Product::findOrFail($productId);
        $product->update($productData);

        $cat = $productData['category_id'];
        foreach ($cat as $categoryId){
            $category = Category::find($categoryId);
            $product->categories()->allRelatedIds();
            $product->categories()->sync($category);
            $product->categories()->allRelatedIds();
        }


    }

    public function getAvailableProducts()
    {
        return Product::where('is_active', true);
    }

};
