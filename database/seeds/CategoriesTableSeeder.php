<?php


use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = new \App\Model\Categories();
        $categories->name = "Action";
        $categories->description = "Экшен игры";
        $categories->save();
        $categories = new \App\Model\Categories();
        $categories->name = "RPG";
        $categories->description = "Рулевые игры";
        $categories->save();
        $categories = new \App\Model\Categories();
        $categories->name = "Квесты";
        $categories->description = "Квесты";
        $categories->save();
        $categories = new \App\Model\Categories();
        $categories->name = "Онлайн-игры";
        $categories->description = "Онлайн игры";
        $categories->save();
        $categories = new \App\Model\Categories();
        $categories->name = "Стратегии";
        $categories->description = "Стратегии";
        $categories->save();

    }
}
