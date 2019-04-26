<?php

use Illuminate\Database\Seeder;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$laptops = factory(App\Product::class, 'laptop', 17)->create();
    }
}
