<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_bookings')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('hc_bookings')->insert([
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 30)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-03',
                'checkout' => '2021-10-04',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 40)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-09-15',
                'checkout' => '2021-09-25',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 60)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 30)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 30)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 30)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 30)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 30)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 90)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 90)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 90)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 90)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 90)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 120)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 120)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 120)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 210)),
            ],

            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 210)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 210)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 210)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 210)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 210)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 210)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 150)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 150)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 150)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 180)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 180)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 240)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 240)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 240)),
            ],
            [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 240)),
            ], [
                'guest_id' => 1,
                'checkin' => '2021-10-01',
                'checkout' => '2021-10-11',
                'status' => 1,
                'amount' => 1,
                'created_at' => date('Y-m-d H:i:s', time() - (86400 * 240)),
            ],

        ]);
    }
}
