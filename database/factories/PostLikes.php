<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostLike;
use Faker\Generator as Faker;

$factory->define(PostLike::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1,50),
        'post_id' => random_int(1,50),
    ];
});
