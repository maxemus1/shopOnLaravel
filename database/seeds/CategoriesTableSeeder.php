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
        \App\Model\Сategory::firstOrCreate(
            [
                'name' => 'Action',
                'description' => 'Экшен игры'
            ]
        );
        \App\Model\Сategory::firstOrCreate(

            [
                'name' => 'RPG',
                'description' => 'Рулевые игры'
            ]
        );
        \App\Model\Сategory::firstOrCreate(
            [
                'name' => 'Квесты',
                'description' => 'Квесты'
            ]);
        \App\Model\Сategory::firstOrCreate(
            [
                'name' => 'Онлайн-игры',
                'description' => 'Онлайн-игры'
            ]);
        \App\Model\Сategory::firstOrCreate(
            [
                'name' => 'Стратегии',
                'description' => 'Стратегии'
            ]
        );
    }
}
