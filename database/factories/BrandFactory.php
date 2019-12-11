<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use  APP\Brand;
use Faker\Generator as Faker;

$factory->define(\App\Brand::class, function (Faker $faker) {
    return [
        'brand_name' =>$faker->word,
        'brand_desc' =>$faker->sentence,
        'brand_image' =>$faker->imageUrl,
        'status' => rand(0,1)
    ];
});
