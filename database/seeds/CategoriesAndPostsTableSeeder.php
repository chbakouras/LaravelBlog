<?php

/**
 * @author Chrisostomos Bakouras.
 */
class CategoriesAndPostsTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'slug' => 'no-category',
            'name' => 'No Category',
            'description' => 'The default category.'
        ]);
        factory(App\Models\Category::class, 10)->create()->each(function($u) {
            $u->posts()->save(factory(App\Models\Post::class)->create());
        });
    }
}