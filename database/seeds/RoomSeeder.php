<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_rooms')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('hc_rooms')->insert([
            [
                'room_type_id' => 1,
            ],
            [
                'room_type_id' => 1,
            ],
            [
                'room_type_id' => 2,
            ],
            [
                'room_type_id' => 2,
            ],
            [
                'room_type_id' => 2,
            ],
            [
                'room_type_id' => 3,
            ],
            [
                'room_type_id' => 3,
            ],
            [
                'room_type_id' => 3,
            ],
            [
                'room_type_id' => 3,
            ],
            [
                'room_type_id' => 4,
            ],
            [
                'room_type_id' => 4,
            ],
            [
                'room_type_id' => 4,
            ],
            [
                'room_type_id' => 4,
            ],
            [
                'room_type_id' => 5,
            ],
            [
                'room_type_id' => 5,
            ],
            [
                'room_type_id' => 5,
            ],
            [
                'room_type_id' => 5,
            ], 
            [
                'room_type_id' => 5,
            ],
            [
                'room_type_id' => 6,
            ],
            [
                'room_type_id' => 6,
            ],
            [
                'room_type_id' => 6,
            ],
            [
                'room_type_id' => 6,
            ],
            [
                'room_type_id' => 7,
            ],
            [
                'room_type_id' => 7,
            ],
            [
                'room_type_id' => 7,
            ],
            [
                'room_type_id' => 8,
            ],
            [
                'room_type_id' => 8,
            ],
            [
                'room_type_id' => 8,
            ],
            [
                'room_type_id' => 8,
            ],
            [
                'room_type_id' => 8,
            ],
            [
                'room_type_id' => 8,
            ],
        ]);
    }
}
