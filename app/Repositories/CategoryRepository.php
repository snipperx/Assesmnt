<?php

namespace App\Repositories;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function all()
    {
        return Category::getAllCategories();
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $category = Category::create($data);
            DB::commit();
            return response()->json($category);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(array $data, $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $category = Category::findOrFail($id);
            $category->update($data);
            DB::commit();
        },5);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->product()->detach();
        $category->delete();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }
}
