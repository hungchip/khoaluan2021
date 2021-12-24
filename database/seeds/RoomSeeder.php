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
                'room_number' => 'a12s',
            ],
            [
                'room_type_id' => 1,
                'room_number' => 'fge12',
            ],
            [
                'room_type_id' => 2,
                'room_number' => '2eqe',
            ],
            [
                'room_type_id' => 2,
                'room_number' => '23as',
            ],
            [
                'room_type_id' => 2,
                'room_number' => 'dfe212',
            ],
            [
                'room_type_id' => 3,
                'room_number' => 'gh2341',
            ],
            [
                'room_type_id' => 3,
                'room_number' => 'eu23',
            ],
            [
                'room_type_id' => 3,
                'room_number' => 'tryu24',
            ],
            [
                'room_type_id' => 3,
                'room_number' => 'rjf34',
            ],
            [
                'room_type_id' => 4,
                'room_number' => '3dfo4',
            ],
            [
                'room_type_id' => 4,
                'room_number' => 'ruh3r',
            ],
            [
                'room_type_id' => 4,
                'room_number' => 'ridk43',
            ],
            [
                'room_type_id' => 4,
                'room_number' => 'vel32',
            ],
            [
                'room_type_id' => 5,
                'room_number' => 'doic312',
            ],
            [
                'room_type_id' => 5,
                'room_number' => 'vkfe432',
            ],
            [
                'room_type_id' => 5,
                'room_number' => 'bmld322',
            ],
            [
                'room_type_id' => 5,
                'room_number' => 'rkglf342',
            ], 
            [
                'room_type_id' => 5,
                'room_number' => 'mld321',
            ],
            [
                'room_type_id' => 6,
                'room_number' => 'trkf213',
            ],
            [
                'room_type_id' => 6,
                'room_number' => 'klgp213',
            ],
            [
                'room_type_id' => 6,
                'room_number' => 'tsdl21',
            ],
            [
                'room_type_id' => 6,
                'room_number' => 'kpl321',
            ],
            [
                'room_type_id' => 7,
                'room_number' => 'tnjs213',
            ],
            [
                'room_type_id' => 7,
                'room_number' => 'fdlpv213',
            ],
            [
                'room_type_id' => 7,
                'room_number' => 'fhuelm23',
            ],
            [
                'room_type_id' => 8,
                'room_number' => 'fakse12',
            ],
            [
                'room_type_id' => 8,
                'room_number' => 'rkds217',
            ],
            [
                'room_type_id' => 8,
                'room_number' => 'dfkj343',
            ],
            [
                'room_type_id' => 8,
                'room_number' => 'okgfp34',
            ],
            [
                'room_type_id' => 8,
                'room_number' => '6f9dg',
            ],
            [
                'room_type_id' => 8,
                'room_number' => '3430dnmvkc',
            ],
        ]);
    }
}
