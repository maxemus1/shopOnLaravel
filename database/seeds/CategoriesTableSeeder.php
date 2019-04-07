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
            ]
        );
        \App\Model\Categories::firstOrCreate(

            [
                'name' => 'RPG',
                'description' => 'Рулевые игры'
            ]
        );
        \App\Model\Categories::firstOrCreate(
            [
                'name' => 'Квесты',
                'description' => 'Квесты'
            ]);
        \App\Model\Categories::firstOrCreate(
            [
                'name' => 'Онлайн-игры',
                'description' => 'Онлайн-игры'
            ]);
        \App\Model\Categories::firstOrCreate(
            [
                'name' => 'Стратегии',
                'description' => 'Стратегии'
            ]
        );
    }
}
