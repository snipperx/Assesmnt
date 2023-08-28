<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function categories_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('categories', [
                'id', 'name', 'slug'
            ]), 1);
    }

    /** @test */
    public function a_category_belongs_to_many_products()
    {
        $product = factory(Product::class)->create();
        $category = factory(Category::class)->create();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $category->product);
    }
}
