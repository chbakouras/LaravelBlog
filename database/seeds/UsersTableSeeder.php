<?php
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

/**
 * @author Chrisostomos Bakouras.
 */
class UsersTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Chrisostomos Bakouras',
            'email' => 'example@example.com',
            'status' => Config::get('blog.auth.status.active'),
            'password' => bcrypt('example'),
            'role_id' => 1,
        ]);
    }
}
