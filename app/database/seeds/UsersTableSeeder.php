<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	    DB::table('users')->delete();
            User::create(
                ['id' => 1, 
            	'username' => 'mlsn87',
                'password' => Hash::make('mlsn87'),
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
            User::create(
            	['id' => 2,
            	'username' => 'admin',
            	'password' => Hash::make('admin'),
            	'email' => 'admin@example.com',
            	'admin' => true
            	]
            );
	}
}
