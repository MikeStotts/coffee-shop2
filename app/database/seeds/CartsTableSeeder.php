<?php
class CartsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            DB::table('carts')->delete();
            Cart::create(
                ['id' => 1, 
                 'user_id' => 1,
                 'product_id' => 1,
                 'quantity' => 1
                ]
            );
            Cart::create(
                ['id' => 2, 
                 'user_id' => 1,
                 'product_id' => 2,
                 'quantity' => 2
                ]
            );
            Cart::create(
                ['id' => 3, 
                 'user_id' => 1,
                 'product_id' => 3,
                 'quantity' => 4
                ]
            );
	}
}
