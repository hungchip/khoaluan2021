<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_services')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('hc_services')->insert([
            [
                'service_name' => 'Thuốc lá',
                'service_price' => 20000,
                'unit' => 'Bao',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'service_name' => 'Nước ngọt',
                'service_price' => 15000,
                'unit' => 'Lon',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'service_name' => 'Bia(Sài Gòn, 333, Tiger)',
                'service_price' => 20000,
                'unit' => 'Lon',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
