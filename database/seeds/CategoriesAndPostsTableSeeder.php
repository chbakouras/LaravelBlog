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
        factory(App\Models\Category::class, 20)->create()->each(function($u) {
            $u->posts()->save(factory(App\Models\Post::class)->create());
        });
    }
}