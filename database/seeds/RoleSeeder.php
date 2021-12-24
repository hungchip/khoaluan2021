<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_roles')->truncate();
        DB::table('hc_admins_roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('hc_roles')->insert([
            ['role_name' => 'admin'],
            ['role_name' => 'author'],
            ['role_name' => 'receptionist'],
            ['role_name' => 'basic'],
        ]);
    }
}
