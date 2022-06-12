<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Product add
     *
     * @return void
     */
    public function test_product_add()
    {
        $product = Product::factory()
            ->hasAttached(Category::factory()->count(1))
            ->create();

        $price = Price::factory()->create(['product_id' => $product->id]);

        $this->assertNotEmpty($product);
        $this->assertNotEmpty($price);
        //$this->assertTrue($price->product->contains($product));

    }

    /**
     * Category add
     *
     * @return void
     */
    public function test_category_add()
    {
        $category = Category::factory()->create();

        $this->assertNotEmpty($category);
    }

}
