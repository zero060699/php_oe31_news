<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'user_id' => $faker->randomDigit,
        'content' => $faker->text,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'view' => 1,
        'category_id' => $faker->unique()->randomDigit,
        'status' => 1,
    ];
});
