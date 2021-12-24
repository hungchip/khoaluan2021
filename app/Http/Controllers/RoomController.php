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
    {
        $rooms = Room::paginate(10);
        $roomTypes = RoomType::all();
        return view('admin.room.index', compact('rooms', 'roomTypes'));
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

        // for ($i = 0; $i < $request->amount; $i++) {
        //     $room = new Room();
        //     $room->room_type_id = $request->roomType;
        //     $room->save();
        // }

        $room = new Room();
        $room->room_type_id = $request->roomType;
        $room->room_number = $request->room_number;
        $room->save();

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm mới thành công!!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        $roomType = RoomType::find($room->room_type_id);

        return view('admin.room.detail', compact('room','roomType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        $roomTypes = RoomType::all();
        return view('admin.room.edit', compact('room','roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        if($room->room_type_id != $request->roomTypeId){
            $oldRoomType = RoomType::where('room_type_id', $room->room_type_id)->get();
            $oldRoomType->room_type_amount--;
            $oldRoomType->save();
            $newRoomType = RoomType::where('room_type_id', $request->roomTypeId)->get();
            $newRoomType->room_type_amount++;
            $newRoomType->save();
            $room->room_type_id = $request->roomTypeId;
        }
        
        
        $room->room_number = $request->room_number;
        $room->save();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Sửa phòng thành công !!!']);
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
        $roomType->room_type_amount--;
        $roomType->save();
        $room->delete();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Xóa thành công!!!']);
    }

    public function showMapRoom()
    {
        $rooms = Room::all();
        $roomTypes = RoomType::where('room_type_amount','>',0)->get();
        $emptyRooms = Room::where('room_status', 0)->get();
        $checkedRooms = Room::where('room_status', '!=', 0)->get();
        return view('admin.room.map', compact('rooms', 'roomTypes', 'emptyRooms', 'checkedRooms'));
    }
}
