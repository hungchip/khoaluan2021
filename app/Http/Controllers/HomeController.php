<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Contact;
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

    public function showPageRoom(Request $request)
    {
        if ($request->data != null) {
            $roomTypes = RoomType::orWhere('room_type_name', 'LIKE', '%' . $request->data . '%')
                ->orWhere('room_type_price', $request->data)
                ->where('room_type_amount', '>', 0)
                ->get();
        } else {
            $roomTypes = RoomType::where('room_type_amount', '>', 0)->get();
        }
        $specialRooms = RoomType::orderBy('room_type_price', 'DESC')->take(5)->get();
        return view('hotel.rooms', compact('roomTypes', 'specialRooms'));
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

    public function showPageBlog(Request $request)
    {

        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();

        if ($request->data != null) {
            $blogs = Blog::where('title', 'like', '%' . $request->data . '%')
                ->orWhere('quote', 'LIKE', '%' . $request->data . '%')
                ->orderBy('created_at', 'desc')->get();
        } else {
            $blogs = Blog::orderBy('created_at', 'desc')->get();
        }

        $specialRooms = RoomType::orderBy('room_type_price', 'DESC')->take(5)->get();
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
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ], []);
        $contact = new Contact();
        $contact->contact_name = $request->name;
        $contact->contact_email = $request->email;
        $contact->contact_phone = $request->phone;
        $contact->contact_content = $request->message;
        $contact->save();

        Mail::send('email.contact-email', [
            'request' => $request,
        ], function ($email) use ($request) {
            $email->to($request->email);
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

    public function showPageSeacrh(Request $request)
    {
        // $roomTypes = RoomType::all();
        // $blogs = Blog::orderBy('created_at', 'desc')->get();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        $specialRooms = RoomType::orderBy('room_type_price', 'desc')->take(3)->get();

        if ($request->data) {
            //tìm loại phòng theo giá và theo tên
            $roomTypes = RoomType::where('room_type_name', 'LIKE', '%' . $request->data . '%')
                ->orWhere('room_type_price', $request->data)
                ->get();
            //tìm bài viết theo tiêu đề
            $blogs = Blog::where('title', 'LIKE', '%' . $request->data . '%')
                ->orWhere('quote', 'LIKE', '%' . $request->data . '%')
                ->get();

        }
        return view('hotel.search', compact('blogs', 'recentBlogs', 'roomTypes', 'specialRooms'));
    }

}
