<?php

class ProductsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            DB::table('products')->delete();
            Product::create(
                ['id' => 1, 'product_name' => 'vanilla',
                  	'description' => 'French Vanilla',
                    'price' => 3.95]
            );
            Product::create(
               ['id' => 2, 'product_name' => 'hazelnut',
                    'description' => 'Hazelnut Creme',
                    'price' => 3.85]
            );
            Product::create(
                ['id' => 3, 'product_name' => 'colombian',
                    'description' => 'Colombian',
                    'price' => 4.75]
            );
	}
}
