<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Guest;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $conditions = [];
            $checkin = $request->t_start;
            $checkout = $request->t_end;
            $bookingID = $request->bookingID;
            $email = $request->email;
            $phone = $request->phone;
            $name = $request->name;
            $status = $request->status;
            $idcard = $request->idcard;
            $query = Booking::query();

            if ($bookingID) {
                $query->where('booking_id', 'LIKE', '%' . $bookingID . '%');
            }
            if ($email) {
                $query->select('hc_bookings.*', 'g1.guest_email')->join('hc_guests as g1', 'g1.guest_id', '=', 'hc_bookings.guest_id')->where('g1.guest_email', 'LIKE', '%' . $email . '%');
            }
            if ($name) {
                $query->select('hc_bookings.*', 'g2.guest_name')->join('hc_guests as g2', 'g2.guest_id', '=', 'hc_bookings.guest_id')->where('g2.guest_name', 'like', '%' . $name . '%');
            }
            if ($phone) {
                $query->where('g1.guest_phone', 'LIKE', '%' . $phone . '%');
            }
            if ($idcard) {
                $query->where('g1.guest_idcard', 'LIKE', '%' . $idcard . '%');
            }
            if ($status != null) {
                $query->where('status', $status);
            }
            $bookings = $query->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $bookings = Booking::orderBy('created_at')->paginate(10);
        }

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();
        return view('admin.booking.create', compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBooking(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required|numeric',
                'paymentMethod' => 'required',
                't_start' => 'required',
                't_end' => 'required',
                'idcard' => 'required|numeric',
            ],
            [
                't_start.required' => 'The date start field is required.',
                't_end.required' => 'The date end field is required.',
            ]);

        $arr = [];
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        $arr['name'] = $request->name;
        $arr['email'] = $request->email;
        $arr['address'] = $request->address;
        $arr['phone'] = $request->phone;
        $arr['room_amount'] = $request->room_amount;
        $arr['idcard'] = $request->idcard;
        $roomAmount = $request->room_amount;
        $roomTypeId = $request->room_type_id;
        $roomAdult = $request->room_adult;
        $roomChild = $request->room_child;

        $bookingID = $this->createBooking($arr, $roomAdult, $roomChild, $roomTypeId);
        $booking = Booking::find($bookingID);
        $bookingDetails = BookingDetail::where('booking_id', $bookingID)->get();
        $roomType = RoomType::where('room_type_id', $request->room_type_id)->first();
        $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();

        //send mail
        Mail::send('email.booking-confirm-email', [
            'request' => $request,
            'booking' => $booking,
            'bookingDetails' => $bookingDetails,
        ], function ($email) use ($request) {
            $email->to($request->email);
            $email->subject('Anh Em Hotel');
        });

        if ($request->flag) {
            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'T???o ?????t ph??ng th??nh c??ng !!!']);
        } else {
            return view('hotel.form-booking.booking-4', compact('arr', 'roomTypes', 'roomType', 'roomAmount', 'roomAdult', 'roomChild', 'roomTypeId'));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        $bookingDetails = BookingDetail::where('booking_id', $id)->get();
        $valid = 0;
        $check = BookingDetail::where('status', 2)
            ->where('booking_id', $id)->get(); // ki???m tra h???p l???

        if (count($bookingDetails) == count($check) && $booking->status != 1 && $booking->deposit_status == 1) {
            $valid = 1;
        }
        return view('admin.booking.detail', compact('bookingDetails', 'booking', 'valid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $bookingDetails = BookingDetail::where('booking_id', $id)->get();
        $guest = Guest::find($booking->guest_id);
        $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();

        return view('admin.booking.edit', compact('bookingDetails', 'booking', 'roomTypes', 'guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required|numeric',
                'paymentMethod' => 'required',
                'idcard' => 'required|numeric',
            ],
            [

            ]
        );

        $booking = Booking::find($id);
        $booking->amount = $request->room_amount;
        if ($request->t_start != "null") {
            $booking->checkin = $request->t_start;
        }
        if ($request->t_end != "null") {
            $booking->checkout = $request->t_end;
        }
        if ($request->deposit_status != null) {
            $booking->deposit_status = 1;
        }
        if ($request->deposit) {
            $booking->deposit = $request->deposit;
        }
        $booking->status = 0;
        $booking->save();

        //update guest
        $booking->guest->guest_name = $request->name;
        $booking->guest->guest_phone = $request->phone;
        $booking->guest->guest_address = $request->address;
        $booking->guest->guest_email = $request->email;
        $booking->guest->guest_idcard = $request->idcard;
        $booking->guest->save();

        //update booking detail
        $bookingDetails = BookingDetail::where('booking_id', $id)->get();
        for ($i = 0; $i < 5; $i++) {
            if (isset($bookingDetails[$i]) && $i < $request->room_amount) {
                $bookingDetails[$i]->room_type_id = $request->room_type_id[$i];
                $bookingDetails[$i]->roomAdult = $request->room_adult[$i];
                $bookingDetails[$i]->roomChild = $request->room_child[$i];
                $bookingDetails[$i]->status = 0;
                $bookingDetails[$i]->save();
            } elseif (!isset($bookingDetails[$i]) && $i < $request->room_amount) {
                $bookingDetail = new BookingDetail();
                $bookingDetail->booking_id = $id;
                $bookingDetail->room_type_id = $request->room_type_id[$i];
                $bookingDetail->roomAdult = $request->room_adult[$i];
                $bookingDetail->roomChild = $request->room_child[$i];
                $bookingDetail->no = $i + 1;
                $bookingDetail->status = 0;
                $bookingDetail->save();
            } elseif (isset($bookingDetails[$i]) && $i >= $request->room_amount) {
                $bookingDetails[$i]->delete();
            }
        }

        //send mail
        Mail::send('email.booking-change-email', [
            'request' => $request,
            'booking' => $booking,
            'bookingDetails' => $bookingDetails,
        ], function ($email) use ($request) {
            $email->to($request->email);
            $email->subject('Anh Em Hotel');
        });

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'C???p nh???t ?????t ph??ng th??nh c??ng !!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->status = 3;
        $guestEmail = $booking->guest->guest_email;
        $bookingDetails = BookingDetail::where('booking_id', $id)->get();
        foreach ($bookingDetails as $bookingDetail) {
            $bookingDetail->status = 3;
            $bookingDetail->save();
        }
        Mail::send('email.cancel-booking', [
            'booking' => $booking,
        ], function ($email) use ($guestEmail) {
            $email->to($guestEmail);
            $email->subject('Anh Em Hotel');
        });
        $booking->save();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'H???y ?????t ph??ng th??nh c??ng !!!']);
    }

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
        $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();
        // $rooms = Room::where('room_status', 0)->get();
        $roomAmount = $request->room_amount;
        // $start = strtotime($arr['t_start']);
        // $end = strtotime($arr['t_end']);
        // $count = 0;
        return view('hotel.form-booking.booking-1', compact('arr', 'roomTypes', 'roomAmount', 'roomAdult', 'roomChild', 'count'));
    }

    public function showStepFour(Request $request)
    {
        $arr = [];
        $roomAdult = $request->room_adult;
        $roomChild = $request->room_child;
        $roomTypeId = $request->room_type_id;
        $arr['t_start'] = $request->t_start;
        $arr['t_end'] = $request->t_end;
        $roomAmount = $request->room_amount;
        $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();
        return view('hotel.form-booking.booking-3', compact('arr', 'roomTypes', 'roomAmount', 'roomAdult', 'roomChild', 'roomTypeId'));
    }

    public function showFinalStep(Request $request)
    {
        // return view('hotel.form-booking.booking-4');
    }

    public function createBooking(array $arr, $roomAdult, $roomChild, $roomTypeId)
    {
        $guest = new Guest();
        $guest->guest_name = $arr['name'];
        $guest->guest_email = $arr['email'];
        $guest->guest_address = $arr['address'];
        $guest->guest_phone = $arr['phone'];
        $guest->guest_idcard = $arr['idcard'];
        $guest->save();

        $booking = new Booking();
        $booking->guest_id = $guest->guest_id;
        $booking->checkin = $arr['t_start'];
        $booking->checkout = $arr['t_end'];
        $booking->amount = $arr['room_amount'];
        $booking->status = 0; // ch??? duy???t
        $booking->save();

        for ($i = 0; $i < $arr['room_amount']; $i++) {
            $bookingDetail = new BookingDetail();
            $bookingDetail->booking_id = $booking->booking_id;
            $bookingDetail->no = $i + 1;
            $bookingDetail->roomAdult = $roomAdult[$i];
            $bookingDetail->roomChild = $roomChild[$i];
            $bookingDetail->room_type_id = $roomTypeId[$i];
            $bookingDetail->status = 0; // ch??a ki???m tra
            $bookingDetail->save();
        }

        return $booking->booking_id;
    }

    public function checkBookingDetail($id)
    {
        // l???y th??ng tin hi???n t???i
        $bookingDetail = BookingDetail::find($id); //l???y id chi ti???t ?????t ph??ng
        $roomTypeId = $bookingDetail->room_type_id; //l???y id lo???i ph??ng
        $start = strtotime($bookingDetail->booking->checkin); // checkin c???a booking
        $end = strtotime($bookingDetail->booking->checkout); // checkout c???a booking
        $checkins = [];
        $checkouts = [];

        //l???c lo???i ph??ng
        // status = 0 -> ch??a ki???m tra
        // status = 1 -> ???? ki???m tra
        // status = 2 -> h???p l???
        // status = 3 -> ko h???p l???
        // status = 4 -> ???? duy???t
        $allBookingDetails = BookingDetail::whereIn('status', [1, 2]) //???? ki???m tra v?? ???? giao
            ->where('room_type_id', $roomTypeId)
            ->where('booking_detail_id', '!=', $id)->get();
        if (count($allBookingDetails) > 0) {
            foreach ($allBookingDetails as $bookingDetail) {
                $checkins[] = strtotime($bookingDetail->booking->checkin);
                $checkouts[] = strtotime($bookingDetail->booking->checkout);
            }
        }
        // dd($checkins);
        // s??? ph??ng c???a lo???i ph??ng ????;
        $rooms = Room::where('room_type_id', $roomTypeId)->get();
        $roomAmount = count($rooms); // s??? l?????ng ph??ng c???a lo???i ph??ng;
        // l???c ???????c lo???i ph??ng
        $dem = 0; // ch??a c?? g?? trong db
        if (count($allBookingDetails) == 0) {
            $bookingDetail->status = 1;
            $bookingDetail->save();
            return redirect()->back();
        } elseif (count($allBookingDetails) > 0) {
            for ($i = 0; $i < count($allBookingDetails); $i++) {
                if (!(($start < $checkins[$i] && $end < $checkins[$i]) || ($start > $checkouts[$i] && $end > $checkouts[$i]))) {
                    $bookingDetail->status = -1;
                    $bookingDetail->save();
                    return redirect()->back();
                }
            }
        }

    }

    public function approveBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 1; // ???? duy???t
        $booking->save();
        $bookingDetails = BookingDetail::where('booking_id', $id)->get();
        foreach ($bookingDetails as $bookingDetail) {
            $bookingDetail->status = 4; // ???? duy???t
            $bookingDetail->save();
        }
        //send mail
        Mail::send('email.booking-success-email', [
            'booking' => $booking,
            'bookingDetails' => $bookingDetails,
        ], function ($email) use ($booking) {
            $email->to($booking->guest->guest_email);
            $email->subject('Anh Em Hotel');
        });

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Duy???t ?????t ph??ng th??nh c??ng !!!']);
    }

    // public function approveBookingDetail(Request $request, $id)
    // {
    //     $bookingDetail = BookingDetail::find($id);
    //     if ($request->flag == 1) {
    //         $bookingDetail->status = 4;//
    //     } else {
    //         $bookingDetail->status = -1;
    //     }
    //     $bookingDetail->save();
    //     return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Ki???m tra th??nh c??ng!!!']);
    // }

    //ki???m tra t??nh h???p l??? c???a ?????t ph??ng
    public function check($id)
    {
        $bookingDetail = BookingDetail::find($id);
        $booking = Booking::find($bookingDetail->booking_id);
        $bookings = Booking::where('deposit_status', 1)->get();
        $bookingID = [];
        foreach ($bookings as $booking) {
            $bookingID[] = $booking->booking_id;
        }
        $start = strtotime($booking->checkin);
        $end = strtotime($booking->checkout);
        $bookingDettails = [];

        $roomTypeId = $bookingDetail->room_type_id;
        $allBookingDetails = BookingDetail::whereIn('status', [2, 4]) //???? ki???m tra v?? ???? giao
            ->where('room_type_id', $roomTypeId)
            ->where('booking_detail_id', '!=', $id)->get(); // ?????t ph??ng c?? lo???i ph??ng n??y v?? ???? giao
        $rooms = Room::where('room_type_id', $roomTypeId)->get(); // s??? l?????ng ph??ng c???a lo???i ph??ng n??y
        foreach ($allBookingDetails as $allBookingDetail) {
            if ($this->checkDate($allBookingDetail, $start, $end) == 0) {
                $bookingDetails[] = $allBookingDetail;
            }
        }
        if ((isset($bookingDetails) && count($bookingDetails) < count($rooms)) || !(isset($bookingDetails))) {
            $bookingDetail->status = 2; // h???p l???
        } else {
            $bookingDetail->status = 3; // kh??ng h???p l???
        }
        $bookingDetail->save();
        return view('admin.booking.check', compact('bookingDetail', 'bookingDetails', 'booking', 'rooms'));
    }

    public function checkDate(BookingDetail $bookingDetail, $start, $end)
    {
        $checkin = strtotime($bookingDetail->booking->checkin);
        $checkout = strtotime($bookingDetail->booking->checkout);
        if (($start < $checkin && $end < $checkin) || ($start > $checkout && $end > $checkout)) {
            return 1;
        }
        return 0;
    }

    public function checkout($id)
    {
        $booking = Booking::find($id);
        $booking->status = 2; // ???? tr??? ph??ng
        $booking->save();
        $bookingDetails = BookingDetail::where('booking_id', $id)->get();
        foreach ($bookingDetails as $bookingDetail) {
            $bookingDetail->status = 5;
            $bookingDetail->save();
        }

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Tr??? ph??ng th??nh c??ng !!!']);
    }
}
