<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->randomElement(['Ritmos Latinos', 'Kpop', 'tango'
        , 'Ballet para adultos', 'Pilates (flex y acondicionamiento)'
        , 'Danza arabe basico', 'Danza arabe intermedio', 'Danza arabe avanzado']),
	    'description' => $faker->sentence
    ];
});
