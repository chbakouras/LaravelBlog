<?php

/**
 * @author Chrisostomos Bakouras.
 */
class PostsTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Post::class, 100)->create();
    }
}