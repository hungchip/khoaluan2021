<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_list_images')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('hc_list_images')->insert([
            [
                'room_type_id' => 1,
                'link' => 'room-15.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 1,
                'link' => 'room-17.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 1,
                'link' => 'room-02.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 2,
                'link' => 'gallery-01.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 2,
                'link' => 'room-01.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 2,
                'link' => 'room-05.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 3,
                'link' => 'gallery-02.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 3,
                'link' => 'room-04.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 3,
                'link' => 'room-03.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 4,
                'link' => 'room-07.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 4,
                'link' => 'room-08.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 4,
                'link' => 'room-15.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 5,
                'link' => 'room-06.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 5,
                'link' => 'room-05.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 5,
                'link' => 'room-17.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 6,
                'link' => 'room-03.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 6,
                'link' => 'room-08.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 6,
                'link' => 'room-gallery-03.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 7,
                'link' => 'room-02.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 7,
                'link' => 'room-06.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 7,
                'link' => 'room-04.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 8,
                'link' => 'room-03.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 8,
                'link' => 'room-07.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_id' => 8,
                'link' => 'room-01.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
