<?php

use App\Brand;
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
        factory(Brand::class,10)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
