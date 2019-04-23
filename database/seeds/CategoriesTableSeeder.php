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
        \App\Model\Category::firstOrCreate(
            [
                'name' => 'Action',
                'description' => 'Экшен игры'
            ]
        );
        \App\Model\Category::firstOrCreate(

            [
                'name' => 'RPG',
                'description' => 'Рулевые игры'
            ]
        );
        \App\Model\Category::firstOrCreate(
            [
                'name' => 'Квесты',
                'description' => 'Квесты'
            ]);
        \App\Model\Category::firstOrCreate(
            [
                'name' => 'Онлайн-игры',
                'description' => 'Онлайн-игры'
            ]);
        \App\Model\Category::firstOrCreate(
            [
                'name' => 'Стратегии',
                'description' => 'Стратегии'
            ]
        );
    }
}
