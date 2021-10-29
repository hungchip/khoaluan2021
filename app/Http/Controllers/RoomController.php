<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$rooms = Room::all();
        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomTypes = RoomType::all();
        return view('admin.room.create', compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomType = RoomType::find($request->roomType);
        $roomType->room_type_amount++;
        $roomType->save();

        for ($i = 0; $i < $request->amount; $i++) {
            $room = new Room();
            $room->room_type_id = $request->roomType;
            $room->save();
        }

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm mới thành công!!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $roomType = RoomType::find($room->room_type_id);
        if ($roomType->room_type_amount > 1) {
            $roomType->room_type_amount--;
            $roomType->save();
        } else {
            $roomType->destroy($room->room_type_id);
        }
        $room->delete();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Xóa thành công!!!']);
    }
}
