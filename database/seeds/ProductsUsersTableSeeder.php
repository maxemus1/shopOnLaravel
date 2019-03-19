<?php

use Illuminate\Database\Seeder;

class ProductsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO: Переделать миграцию
        for ($d = 0; $d < 40; $d++) {
            $categories = new \App\Model\ProductsUsers();
            $categories->users_id = rand(1, 30);
            $categories->products_id = rand(1, 30);
            $categories->created_at = "2017-01-01 00:00:00";
            $categories->updated_at = "2017-01-01 01:00:00";
            $categories->save();
        }
    }
}
