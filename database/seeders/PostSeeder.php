<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->words(4, true);
            $newPost->slug = Str::of($newPost->title)->slug('-');
            $newPost->image_cover = $faker->imageUrl(400, 400, 'Posts', true, $newPost->title, true, 'png');
            $newPost->description = $faker->paragraph();
            $newPost->save();
        }
    }
}