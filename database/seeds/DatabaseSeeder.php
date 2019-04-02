<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       // factory(App\Model\Order::class)->times(30)->create();
       factory(App\Model\Cart::class)->times(30)->create();
       // $this->call(CategoriesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(ProductsTableSeeder::class);
        //$this->call(ProductsUsersTableSeeder::class);
        //$this->call(NewsTableSeeder::class);
    }
}
