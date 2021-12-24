<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\ListImage;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();
        $specialRooms = RoomType::take(4)->orderBy('room_type_price', 'desc')->get();
        $rooms = Room::all();
        $admins = Admin::all();
        return view('hotel.index', compact('roomTypes', 'specialRooms', 'rooms', 'admins'));
    }

    public function showPageAbout()
    {
        return view('hotel.about');
    }

    public function showPageRoom()
    {
        $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();

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
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        return view('hotel.blog', compact('blogs', 'recentBlogs'));
    }

    public function showPageContact()
    {
        return view('hotel.contact');
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], []);

        Mail::send('email.contact-email', [
            'request' => $request,
        ], function ($email) use ($request) {
            $email->to($request->email);
            $email->from($request->email);
            $email->subject('Anh Em Hotel');
        });

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Gửi Liên hệ thành công!!!']);
    }

    public function showDetailRoom($id)
    {
        $roomType = RoomType::find($id);
        $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();
        $listImages = ListImage::where('room_type_id', $id)->get();
        return view('hotel.detail-rooms', compact('roomType', 'roomTypes', 'listImages'));
    }

    public function showBlogDetail($id)
    {
        $blog = Blog::find($id);
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        return view('hotel.blog-detail', compact('blog', 'recentBlogs'));
    }

}
