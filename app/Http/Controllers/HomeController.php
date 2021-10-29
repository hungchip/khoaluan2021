<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\ListImage;
use App\Models\RoomType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roomTypes = RoomType::all();
        $specialRooms = RoomType::take(4)->orderBy('room_type_price','desc')->get();
        return view('hotel.index', compact('roomTypes','specialRooms'));
    }

    public function showPageAbout()
    {
        return view('hotel.about');
    }

    public function showPageRoom()
    {
        $roomTypes = RoomType::all();

        return view('hotel.rooms', compact('roomTypes'));
    }

    public function showPageBooking()
    {
        return view('hotel.form-booking.booking');
    }

    public function showPageGallery()
    {
        $gallerys = Gallery::all();
        
        return view('hotel.gallery', compact('gallerys'));
    }

    public function showPageBlog()
    {
        return view('hotel.blog');
    }

    public function showPageContact()
    {
        return view('hotel.contact');
    }

    public function showDetailRoom($id)
    {
        $roomType = RoomType::find($id);
        $roomTypes = RoomType::all();
        $listImages = ListImage::where('room_type_id',$id)->get();
        return view('hotel.detail-rooms',compact('roomType', 'roomTypes', 'listImages'));
    }
}
