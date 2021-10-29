<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    // public function showStepOne(Request $request){
    //     $arr = [];
    //     // $arr[]= $request->room_amount;
    //     $arr[] = $request->room_adult;
    //     $arr[] = $request->room_child;
    //     $arr[] = $request->t_start;
    //     $arr[] = $request->t_end;
    //     $roomTypes = RoomType::where('room_type_id', 1)->get();
    //     return view('hotel.form-booking.booking-1', compact('roomTypes', 'arr'));
    //     // return ($request);
    //     // dd($request->t_start);
    // }

    // public function showStepTwo(Request $request){
    //     $roomTypes = RoomType::all();
    //     return view('hotel.form-booking.booking-2', compact('roomTypes'));
    //     // dd($request->all());
    // }

    public function showStepOne(Request $request)
    {
        return view('hotel.form-booking.booking');
    }

    public function showStepTwo(Request $request)
    {
        dd($request->room_adult_);
        $arr = [];
        // $arr[]= $request->room_amount;
        $arr['room_adult'] = $request->room_adult;
        $arr['room_child'] = $request->room_child;
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        // $roomTypes = RoomType::where('room_type_id', 1)->get();
        $roomTypes = RoomType::all();
        $rooms = Room::where('room_status', 0)->get();

        $start = strtotime($arr['t_start']);
        $end = strtotime($arr['t_end']);
        // dd($start < $end);
        return view('hotel.form-booking.booking-1', compact('arr', 'roomTypes'));
    }

    public function showStepThree(Request $request)
    {
        $arr = [];
        $arr['room_adult'] = $request->room_adult;
        $arr['room_child'] = $request->room_child;
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        // $roomType = RoomType::find($request->room_type_id);
        $roomType = RoomType::where('room_type_id', $request->room_type_id)->first();
        return view('hotel.form-booking.booking-2', compact('arr', 'roomType'));
    }

    public function showStepFour(Request $request)
    {
        $arr = [];
        $arr['room_adult'] = $request->room_adult;
        $arr['room_child'] = $request->room_child;
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        $arr['breakfast'] = $request->service1;
        $arr['clean'] = $request->service2;
        $arr['shuttle'] = $request->service3;
        // $roomType = RoomType::find($request->room_type_id);
        $roomType = RoomType::where('room_type_id', $request->room_type_id)->first();
        return view('hotel.form-booking.booking-3', compact('arr', 'roomType'));
    }

    public function showFinalStep(Request $request)
    {
        $request->validate(
            [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],
            [

            ]);
        $arr = [];
        $arr['room_adult'] = $request->room_adult;
        $arr['room_child'] = $request->room_child;
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        $arr['breakfast'] = $request->service1;
        $arr['clean'] = $request->service2;
        $arr['shuttle'] = $request->service3;
        $arr['shuttle'] = $request->service3;
        $arr['name'] = $request->name;
        $arr['address'] = $request->address;
        $arr['email'] = $request->email;
        $arr['phone'] = $request->phone;
        $arr['coupon'] = $request->coupon;
        // $roomType = RoomType::find($request->room_type_id);
        $roomType = RoomType::where('room_type_id', $request->room_type_id)->first();

        return view('hotel.form-booking.booking-4', compact('arr', 'roomType'));
    }

    public function createBooking(array $arr)
    {
        $booking = new Booking();
        $booking->room_type_id = $arr['room_type_id'];
        $booking->booking_adult = $arr['room_adult'];
        $booking->booking_child = $arr['room_child'];
        $booking->checkin = $arr['t_start'];
        $booking->checkout = $arr['t_end'];
        $booking->save();
    }

    public function checkAvailableRoom($start, $end, $adult, $child)
    {
        $timeStart = strtotime($start);
        $timeEnd = strtotime($end);
        // $rooms = Room::where('room_status', 0)->orWhere('')
        // $conditions = [];
        // $conditions = array('room_status', 0);
    }
}
