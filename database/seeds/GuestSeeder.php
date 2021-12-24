<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_guests')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('hc_guests')->insert([
            [
                'guest_email' => 'vuhungdemo@gmail.com',
                'guest_name' => 'Vũ Việt Hưng',
                'guest_address' => "Hà Nội",
                'guest_idcard' => 12234523,
                'guest_phone' => 12234523,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
