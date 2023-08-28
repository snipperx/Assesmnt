<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function products_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('products', [
                'id',
                'name',
                'description',
                'slug',
            ]), 1);
    }

    /** @test */
    public function a_role_belongs_to_many_users()
    {
        $product = factory(Product::class)->create();
        $category = factory(Category::class)->create();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $product->categories);
    }
}
