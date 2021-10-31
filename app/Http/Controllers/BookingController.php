<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Guest;
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
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($guest_id, $checkin, $checkout)
    {
        $this->guest_id = $guest_id;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->save();
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
        // dd($request->room_adult_);
        $arr = [];
        // $arr[]= $request->room_amount;
        // $arr['room_adult'] = $request->room_adult;
        // $arr['room_child'] = $request->room_child;
        $roomAdult = $request->room_adult;
        $roomChild = $request->room_child;
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        $roomTypes = RoomType::all();
        // $rooms = Room::where('room_status', 0)->get();
        $roomAmount = $request->room_amount;
        // $start = strtotime($arr['t_start']);
        // $end = strtotime($arr['t_end']);
        // $count = 0;
        return view('hotel.form-booking.booking-1', compact('arr', 'roomTypes', 'roomAmount', 'roomAdult', 'roomChild', 'count'));
    }

    // public function showStepThree(Request $request)
    // {
    //     $arr = [];
    //     $arr['room_adult'] = $request->room_adult;
    //     $arr['room_child'] = $request->room_child;
    //     $arr['t_start'] = $request->t_start;
    //     $arr['t_end'] = $request->t_end;
    //     // $roomType = RoomType::find($request->room_type_id);
    //     $roomType = RoomType::where('room_type_id', $request->room_type_id)->first();
    //     return view('hotel.form-booking.booking-2', compact('arr', 'roomType'));
    // }

    public function showStepFour(Request $request)
    {
        // dd($request->room_amount);
        $arr = [];
        $roomAdult = $request->room_adult;
        $roomChild = $request->room_child;
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        $roomAmount = $request->room_amount;
        // $arr['breakfast'] = $request->service1;
        // $arr['clean'] = $request->service2;
        // $arr['shuttle'] = $request->service3;
        // $roomType = RoomType::find($request->room_type_id);
        $roomType = RoomType::where('room_type_id', $request->room_type_id)->first();
        return view('hotel.form-booking.booking-3', compact('arr', 'roomType', 'roomAmount', 'roomAdult', 'roomChild'));
    }

    public function showFinalStep(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'paymentMethod' => 'required',
            ],
            [

            ]);
        $arr = [];
        $arr['name'] = $request->name;
        $arr['email'] = $request->email;
        $arr['address'] = $request->address;
        $arr['phone'] = $request->phone;
        $arr['room_amount'] = $request->room_amount;
        $roomAmount = $request->room_amount;
        $arr['checkin'] = $request->t_start;
        $arr['checkout'] = $request->t_end;
        $arr['room_type_id'] = $request->room_type_id;
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        $roomAdult = $request->room_adult;
        $roomChild = $request->room_child;
        $this->createBooking($arr);
        // $roomType = RoomType::find($request->room_type_id);
        $roomType = RoomType::where('room_type_id', $request->room_type_id)->first();

        return view('hotel.form-booking.booking-4', compact('arr', 'roomType', 'roomAmount', 'roomAdult', 'roomChild'));
    }

    public function createBooking(array $arr)
    {
        $guest = new Guest();
        // $guest->create($arr);
        $guest->guest_name = $arr['name'];
        $guest->guest_email = $arr['email'];
        $guest->guest_address = $arr['address'];
        $guest->guest_phone = $arr['phone'];
        $guest->save();
        
        $booking = new Booking();
        $booking->guest_id = $guest->guest_id;
        $booking->checkin = $arr['checkin'];
        $booking->checkout = $arr['checkout'];
        $booking->save();

        $bookingDetail = new BookingDetail();
        $bookingDetail->booking_id = $booking->booking_id;
        $bookingDetail->room_type_id = $arr['room_type_id'];
        $bookingDetail->amount = $arr['room_amount'];
        $bookingDetail->save();
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
