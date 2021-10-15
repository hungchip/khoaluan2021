<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_admins')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(Admin::class,20)->create();
        DB::table('hc_admins')->insert([
            ['admin_name' => 'vuviethung', 'password' => bcrypt('123456789'),'admin_email' => 'vuviethung3498@gmail.com', 'created_at' => new DateTime()],
        ]);
    }
}
