<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_gallerys')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('hc_gallerys')->insert([
            [
                'image' => 'banner2.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'image' => 'banner3.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'image' => 'gallery-01.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'image' => 'gallery-02.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'image' => 'gallery-03.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'image' => 'room-02.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'image' => 'room-05.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'image' => 'room-06.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
