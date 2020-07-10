<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

        return [
            'user_id' => $faker->numberBetween($min = 1, $max = 50),
            'post_id' => $faker->numberBetween($min = 1, $max = 50),
            'text' => $faker->text($maxNbChars = 200),
            'is_published' => 1,
            'published_at' => $faker->dateTimeThisMonth($max = 'now'),
        ];
});
