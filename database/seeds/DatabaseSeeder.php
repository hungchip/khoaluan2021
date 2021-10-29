<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(ListImageSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(RoomSeeder::class);

    }
}
