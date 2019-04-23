<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    // /** @test **/
    // public function seedExample()
    // {
    //     $product = factory(Product::class, 10)->create();

    //     $this->assertEquals(11, Product::count());

    // }

    /** @test **/
    public function a_user_can_search_products()
    {
    	$search = 'apple';

    	$product = factory(Product::class, 2)->create();
        $product = factory(Product::class, 2)->make([
            'name' => "a product with the {$search} term"
        ]);
    	 
        $results = $this->getJson("/products/search?q={$search}")->json(['data']);


        $this->assertCount(4, $results);

    }
}
