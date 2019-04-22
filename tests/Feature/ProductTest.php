<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /** @test **/
    public function seedExample()
    {
        $product = factory(Product::class, 10)->create();

        $this->assertEquals(11, Product::count());

    }
}
