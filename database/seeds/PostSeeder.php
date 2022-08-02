<?php

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categories_ids = Category::all()->pluck('id');

        for ($i = 0; $i < 500; $i++) {
            $post = new Post;

            $post->category_id = $faker->randomElement($categories_ids);
            $post->title = $faker->words(rand(3,7), true);
            $post->slug = Post::getSlug($post->title);
            $post->image = 'https: //picsum.photos/id/' . rand(1,100) . '/300/200';
            $post->content = $faker->paragraph(rand(2,10), true);
            $post->excerpt = $faker->paragraph();
            $post->save();
        }
    }
}
