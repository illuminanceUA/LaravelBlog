<?php

use Illuminate\Database\Seeder;

class PostLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\PostLike::class, 50)->create();
    }
}
