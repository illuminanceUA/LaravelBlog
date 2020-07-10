<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

       return [
            'title' => $faker->title,
            'text' => $faker->text,
            'user_id' => random_int(1,50),
            'published_at' => $faker->dateTimeThisMonth($max = 'now'),
           'image' => 'null',
           //'image'=>'https://source.unsplash.com/random' ,
          // 'image' => $faker->image('public/storage/images',900,300, null, false),
        ];
});
