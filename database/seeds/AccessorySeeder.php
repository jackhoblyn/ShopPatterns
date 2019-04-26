<?php

use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$accessories = factory(App\Product::class, 'accessory', 10)->create();
    }
}
