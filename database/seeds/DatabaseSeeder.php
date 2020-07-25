<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class,20)->create();
        factory(\App\Supplier::class,20)->create();
        factory(\App\Customer::class,20)->create();
    }
}
