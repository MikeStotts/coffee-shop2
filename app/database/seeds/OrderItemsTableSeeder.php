<?php

class OrderItemsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            DB::table('order_items')->delete();
            OrderItem::create(
                ['id' => 1, 
                 'order_id' => 1,
                 'product_id' => 1,
                 'quantity' => 1,
                 'price' => 3.95
                ]
            );
            OrderItem::create(
                ['id' => 2, 
                 'order_id' => 1,
                 'product_id' => 2,
                 'quantity' => 2,
                 'price' => 3.85
                ]
            );
            OrderItem::create(
                ['id' => 3, 
                 'order_id' => 1,
                 'product_id' => 3,
                 'price' => 4.75,
                 'quantity' => 3
                ]
            );
            OrderItem::create(
                ['id' => 4, 
                 'order_id' => 2,
                 'product_id' => 1,
                 'price' => 3.95,
                 'quantity' => 3
                ]
            );
            OrderItem::create(
                ['id' => 5, 
                 'order_id' => 2,
                 'product_id' => 2,
                 'quantity' => 2,
                 'price' => 3.85
                ]
            );
            OrderItem::create(
                ['id' => 6, 
                 'order_id' => 2,
                 'product_id' => 3,
                 'quantity' => 1,
                 'price' => 4.75
                ]
            );
	}
}
