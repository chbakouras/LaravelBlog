<?php
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

/**
 * @author Chrisostomos Bakouras.
 */
class RolesTableSeeder extends \Illuminate\Database\Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Config::get('blog.defaults.role') as $role) {
            DB::table('roles')->insert([
                'name' => $role,
            ]);
        }
    }
}