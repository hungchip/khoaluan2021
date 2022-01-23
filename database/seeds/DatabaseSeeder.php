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
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(ListImageSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(GuestSeeder::class);
        $this->call(BookingSeeder::class);
    }
}
