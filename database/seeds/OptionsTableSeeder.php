<?php
use Illuminate\Support\Facades\DB;

/**
 * @author Chrisostomos Bakouras.
 */
class OptionsTableSeeder extends \Illuminate\Database\Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'name' => 'site-name',
            'value' => 'My Blog',
        ]);
        DB::table('options')->insert([
            'name' => 'post-sidebar-right',
            'value' => 'false',
        ]);
        DB::table('options')->insert([
            'name' => 'post-sidebar-left',
            'value' => 'true',
        ]);
        DB::table('options')->insert([
            'name' => 'page-sidebar-right',
            'value' => 'true',
        ]);
        DB::table('options')->insert([
            'name' => 'page-sidebar-left',
            'value' => 'true',
        ]);
    }
}