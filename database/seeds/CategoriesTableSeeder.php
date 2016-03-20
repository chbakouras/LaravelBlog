<?php

/**
 * @author Chrisostomos Bakouras.
 */
class CategoriesTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Category::class, 20)->create();
    }
}