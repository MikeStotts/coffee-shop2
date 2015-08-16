<?php

class OrdersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            DB::table('orders')->delete();
            Order::create(
                ['id' => 1, 
                 'user_id' => '1',
                 'user_name' => 'mlsn87',
                'email' => 'mlstotts@example.com',
                'phone' => '555-5555',
                'name' => 'Mike Stotts',
                'street' => '9555 Jones Creek Rd.',
                'city' => 'Dittmer',
                'state' => 'MO',
                'zip' => '63023',
                'cc_number' => '5555-5555-5555-5555',
                'cc_type' => 'visa'
                ]
            );
            Order::create(
                ['id' => 2, 
                 'user_id' => '1',
                 'user_name' => 'mlsn87',
                'email' => 'mlstotts@example.com',
                'phone' => '555-5555',
                'name' => 'Mike Stotts',
                'street' => '9555 Jones Creek Rd.',
                'city' => 'Dittmer',
                'state' => 'MO',
                'zip' => '63023',
                'cc_number' => '5555-5555-5555-5555',
                'cc_type' => 'visa'
                ]
            );

	}
}
