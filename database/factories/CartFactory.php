<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\Cart::class, function (Faker $faker) {
    $products = \App\Model\Products::get()->random();
    $user = \App\Model\User::get()->random();
    return [
        'products_id' => $products->id,
        'prise' => $products->prise,
        'user_id' => $user->id,
    ];
});
