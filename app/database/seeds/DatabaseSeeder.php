<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ProductsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('OrdersTableSeeder');
		$this->call('OrderItemsTableSeeder');
		$this->call('CartsTableSeeder');
	}

}
