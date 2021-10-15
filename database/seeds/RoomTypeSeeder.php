<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('hc_room_types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('hc_room_types')->insert([
            [
                'room_type_name' => 'Classic Room',
                'room_type_price' => 2000000,
                'room_type_desc' => 'Super Deluxe Rooms honor the minimalist design style with simple yet elegant furnishings. Super Deluxe Rooms are the perfect choice for couples and families. Nothing is more wonderful than waking up early and indulge yourself in complete harmony with nature of where the earth and sky meet.',
                'room_type_info' => '<ul>
                                        <li>Room size: 30m2</li>
                                        <li>Balcony size: 7m2</li>
                                        <li>Number of rooms: 21</li>
                                        <li>View: Valley View</li>
                                        <li>In-room fresh air system</li>
                                        <li>Balcony</li>
                                        <li>Air-conditioning</li>
                                        <li>LCD television</li>
                                        <li>Free Internet access</li>
                                    </ul>',
                'quote' => 'Deluxe rooms offer comfortable space in the heart hello',
                'room_type_adult' => 4,
                'room_type_child' => 2,
                'avatar' => 'room-07.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_name' => 'Super Deluxe Room',
                'room_type_price' => 2300000,
                'room_type_desc' => 'Super Deluxe Rooms honor the minimalist design style with simple yet elegant furnishings. Super Deluxe Rooms are the perfect choice for couples and families. Nothing is more wonderful than waking up early and indulge yourself in complete harmony with nature of where the earth and sky meet.',
                'room_type_info' => '<ul>
                                        <li>Room size: 30m2</li>
                                        <li>Balcony size: 7m2</li>
                                        <li>Number of rooms: 21</li>
                                        <li>View: Valley View</li>
                                        <li>In-room fresh air system</li>
                                        <li>Balcony</li>
                                        <li>Air-conditioning</li>
                                        <li>LCD television</li>
                                        <li>Free Internet access</li>
                                    </ul>',
                'quote' => 'Deluxe rooms offer comfortable space in the heart',
                'room_type_adult' => 4,
                'room_type_child' => 4,
                'avatar' => 'room-08.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_name' => 'Deluxe Room',
                'room_type_price' => 3000000,
                'room_type_desc' => 'Super Deluxe Rooms honor the minimalist design style with simple yet elegant furnishings. Super Deluxe Rooms are the perfect choice for couples and families. Nothing is more wonderful than waking up early and indulge yourself in complete harmony with nature of where the earth and sky meet.',
                'room_type_info' => '<ul>
                                        <li>Room size: 30m2</li>
                                        <li>Balcony size: 7m2</li>
                                        <li>Number of rooms: 21</li>
                                        <li>View: Valley View</li>
                                        <li>In-room fresh air system</li>
                                        <li>Balcony</li>
                                        <li>Air-conditioning</li>
                                        <li>LCD television</li>
                                        <li>Free Internet access</li>
                                    </ul>',
                'quote' => 'Deluxe rooms offer comfortable space in the heart',
                'room_type_adult' => 2,
                'room_type_child' => 2,
                'avatar' => 'room-02.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_name' => 'Premium Deluxe',
                'room_type_price' => 3000000,
                'room_type_desc' => 'Super Deluxe Rooms honor the minimalist design style with simple yet elegant furnishings. Super Deluxe Rooms are the perfect choice for couples and families. Nothing is more wonderful than waking up early and indulge yourself in complete harmony with nature of where the earth and sky meet.',
                'room_type_info' => '<ul>
                                        <li>Room size: 30m2</li>
                                        <li>Balcony size: 7m2</li>
                                        <li>Number of rooms: 21</li>
                                        <li>View: Valley View</li>
                                        <li>In-room fresh air system</li>
                                        <li>Balcony</li>
                                        <li>Air-conditioning</li>
                                        <li>LCD television</li>
                                        <li>Free Internet access</li>
                                    </ul>',
                'quote' => 'Deluxe rooms offer comfortable space in the heart...',
                'room_type_adult' => 4,
                'room_type_child' => 2,
                'avatar' => 'room-04.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_name' => 'H\'Mong Suite',
                'room_type_price' => 2000000,
                'room_type_desc' => 'Super Deluxe Rooms honor the minimalist design style with simple yet elegant furnishings. Super Deluxe Rooms are the perfect choice for couples and families. Nothing is more wonderful than waking up early and indulge yourself in complete harmony with nature of where the earth and sky meet.',
                'room_type_info' => '<ul>
                                        <li>Room size: 30m2</li>
                                        <li>Balcony size: 7m2</li>
                                        <li>Number of rooms: 21</li>
                                        <li>View: Valley View</li>
                                        <li>In-room fresh air system</li>
                                        <li>Balcony</li>
                                        <li>Air-conditioning</li>
                                        <li>LCD television</li>
                                        <li>Free Internet access</li>
                                    </ul>',
                'quote' => 'Deluxe rooms offer comfortable space in the heart...',
                'room_type_adult' => 2,
                'room_type_child' => 2,
                'avatar' => 'room-03.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_name' => 'Family Suite',
                'room_type_price' => 2500000,
                'room_type_desc' => 'Super Deluxe Rooms honor the minimalist design style with simple yet elegant furnishings. Super Deluxe Rooms are the perfect choice for couples and families. Nothing is more wonderful than waking up early and indulge yourself in complete harmony with nature of where the earth and sky meet.',
                'room_type_info' => '<ul>
                                        <li>Room size: 30m2</li>
                                        <li>Balcony size: 7m2</li>
                                        <li>Number of rooms: 21</li>
                                        <li>View: Valley View</li>
                                        <li>In-room fresh air system</li>
                                        <li>Balcony</li>
                                        <li>Air-conditioning</li>
                                        <li>LCD television</li>
                                        <li>Free Internet access</li>
                                    </ul>',
                'quote' => 'Deluxe rooms offer comfortable space in the heart...',
                'room_type_adult' => 6,
                'room_type_child' => 6,
                'avatar' => 'room-05.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_name' => 'Red Dao Suite',
                'room_type_price' => 1800000,
                'room_type_desc' => 'Super Deluxe Rooms honor the minimalist design style with simple yet elegant furnishings. Super Deluxe Rooms are the perfect choice for couples and families. Nothing is more wonderful than waking up early and indulge yourself in complete harmony with nature of where the earth and sky meet.',
                'room_type_info' => '<ul>
                                        <li>Room size: 30m2</li>
                                        <li>Balcony size: 7m2</li>
                                        <li>Number of rooms: 21</li>
                                        <li>View: Valley View</li>
                                        <li>In-room fresh air system</li>
                                        <li>Balcony</li>
                                        <li>Air-conditioning</li>
                                        <li>LCD television</li>
                                        <li>Free Internet access</li>
                                    </ul>',
                'quote' => 'Deluxe rooms offer comfortable space in the heart...',
                'room_type_adult' => 2,
                'room_type_child' => 2,
                'avatar' => 'room-06.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'room_type_name' => 'Pao\'s Suite',
                'room_type_price' => 2200000,
                'room_type_desc' => 'Super Deluxe Rooms honor the minimalist design style with simple yet elegant furnishings. Super Deluxe Rooms are the perfect choice for couples and families. Nothing is more wonderful than waking up early and indulge yourself in complete harmony with nature of where the earth and sky meet.',
                'room_type_info' => '<ul>
                                        <li>Room size: 30m2</li>
                                        <li>Balcony size: 7m2</li>
                                        <li>Number of rooms: 21</li>
                                        <li>View: Valley View</li>
                                        <li>In-room fresh air system</li>
                                        <li>Balcony</li>
                                        <li>Air-conditioning</li>
                                        <li>LCD television</li>
                                        <li>Free Internet access</li>
                                    </ul>',
                'quote' => 'Deluxe rooms offer comfortable space in the heart...',
                'room_type_adult' => 2,
                'room_type_child' => 2,
                'avatar' => 'room-07.jpeg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            
        ]);
    }
}
