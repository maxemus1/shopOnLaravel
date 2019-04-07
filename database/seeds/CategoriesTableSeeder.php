<?php


use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    //TODO: Переделать миграцию
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Categories::firstOrCreate(
            [
                'name' => 'Action',
                'description' => 'Экшен игры'
            ],
            [
                'name' => 'RPG',
                'description' => 'Рулевые игры'
            ],
            [
                'name' => 'Квесты',
                'description' => 'Квесты'
            ],
            [
                'name' => 'Онлайн-игры',
                'description' => 'Онлайн-игры'
            ],
            [
                'name' => 'Стратегии',
                'description' => 'Стратегии'
            ]
        );
    }
}
