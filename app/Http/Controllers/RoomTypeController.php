<?php

namespace App\Http\Controllers;

use App\Models\ListImage;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomTypes = RoomType::all();

        return view('admin.room-type.index', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric',
            'info' => 'required',
            'quote' => 'required',
            'adult' => 'required|numeric|max:4|min:1',
            'child' => 'nullable|numeric|max:5|min:0',
            'avatar' => 'required|file|image|size:2000',
            'listImage' => 'required',
            'listImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ];
        $mes = [
            'name.required' => ' Tên không được để trống',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá không đúng định dạng',
            'info.required' => 'Thông tin không được để trống',
            'quote.required' => 'Mô tả ngắn không được để trống',
            'adult.required' => 'Số người lớn không được để trống',
            'adult.numeric' => 'Dữ liệu không đúng định dạng',
            'adult.max' => 'Số người lớn tối đa là 4',
            'adult.min' => 'Số người lớn tối thiểu là 1',
            'child.numeric' => 'Dữ liệu không đúng định dạng',
            'child.max' => 'Số trẻ em tối đa là 5',
            'child.min' => 'Số trẻ em tối thiểu là 0',
            'avatar.required' => 'Ảnh đại diện không được để trống',
            'avatar.image' => 'Dữ liệu không đúng định dạng',
            'avatar.size' => 'Dung lượng ảnh tối đa là 2MB',
            'listImage.required' => 'Ảnh đại diện không được để trống',
            'listImage.image' => 'Dữ liệu không đúng định dạng',
            'description.required' => 'Mô tả không được để trống',
        ];
        $request->validate($rules, $mes);

        $roomType = new RoomType();

        $roomType->room_type_name = $request->name;
        $roomType->room_type_price = $request->price;
        $roomType->room_type_desc = $request->description;
        $roomType->room_type_info = $request->info;
        $roomType->quote = $request->quote;
        $roomType->room_type_adult = $request->adult;
        $roomType->room_type_child = $request->child;
        if ($request->file('avatar')) {
            $image = $request->file('avatar');

            $getImageName = $image->getClientOriginalName();
            $imageName = current(explode('.', $getImageName));
            $newImage = $imageName . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/image', $newImage);
            $roomType->avatar = $newImage;
        }
        $roomType->save();

        if ($request->file('listImage')) {
            $images = $request->file('listImage');
            foreach ($images as $image) {
                $listImage = new ListImage();

                $getImageName = $image->getClientOriginalName();
                // dd($getImageName);
                $imageName = current(explode('.', $getImageName));
                $newImage = $imageName . '-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move('public/image', $newImage);

                $listImage->link = $newImage;
                $listImage->room_type_id = $roomType->room_type_id;
                $listImage->save();
            }
        }

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm loại phòng thành công!!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomType = RoomType::find($id);
        $listImages = ListImage::where('room_type_id', $roomType->room_type_id)->get();
        return view('admin.room-type.detail', compact('roomType', 'listImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomType = RoomType::find($id);
        $listImages = ListImage::where('room_type_id', $roomType->room_type_id)->get();
        return view('admin.room-type.edit', compact('roomType', 'listImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric',
            'info' => 'required',
            'quote' => 'required',
            'adult' => 'required|numeric|max:4|min:1',
            'child' => 'nullable|numeric|max:5|min:0',
            'avatar' => 'required|file|image|max:2000',
            'listImage' => 'required',
            'listImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ];
        $mes = [
            'name.required' => ' Tên không được để trống',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá không đúng định dạng',
            'info.required' => 'Thông tin không được để trống',
            'quote.required' => 'Mô tả ngắn không được để trống',
            'adult.required' => 'Số người lớn không được để trống',
            'adult.numeric' => 'Dữ liệu không đúng định dạng',
            'adult.max' => 'Số người lớn tối đa là 4',
            'adult.min' => 'Số người lớn tối thiểu là 1',
            'child.numeric' => 'Dữ liệu không đúng định dạng',
            'child.max' => 'Số trẻ em tối đa là 5',
            'child.min' => 'Số trẻ em tối thiểu là 0',
            'avatar.required' => 'Ảnh đại diện không được để trống',
            'avatar.image' => 'Dữ liệu không đúng định dạng',
            'avatar.max' => 'Dung lượng ảnh tối đa là 2MB',
            'listImage.required' => 'Ảnh đại diện không được để trống',
            'listImage.image' => 'Dữ liệu không đúng định dạng',
            'description.required' => 'Mô tả không được để trống',
        ];
        $request->validate($rules, $mes);

        $roomType = RoomType::find($id);
        $roomType->room_type_name = $request->name;
        $roomType->room_type_price = 100;
        $roomType->room_type_desc = $request->description;
        $roomType->room_type_info = $request->info;
        $roomType->quote = $request->quote;
        $roomType->room_type_adult = $request->adult;
        $roomType->room_type_child = $request->child;
        $roomType->room_type_amount = $request->amount;

        if ($request->file('avatar')) {
            $path = 'public/image/' . $roomType->avatar;
            File::delete($path);
            $image = $request->file('avatar');
            $getImageName = $image->getClientOriginalName();
            $imageName = current(explode('.', $getImageName));
            $newImage = $imageName . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/image', $newImage);
            $roomType->avatar = $newImage;
        }

        if ($request->file('listImage')) {
            $listImages = ListImage::where('room_type_id', $roomType->room_type_id)->get();
            //xóa list ảnh cũ
            foreach ($listImages as $img) {
                $path = 'public/image/' . $img->link;
                File::delete($path);
                $img->delete();
            }

            $images = $request->file('listImage');
            foreach ($images as $image) {
                $listImage = new ListImage();
                $getImageName = $image->getClientOriginalName();
                $imageName = current(explode('.', $getImageName));
                $newImage = $imageName . '-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move('public/image', $newImage);
                $listImage->link = $newImage;
                $listImage->room_type_id = $roomType->room_type_id;
                $listImage->save();
            }
        }
        $roomType->save();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Chỉnh sửa thành công!!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $roomType = RoomType::find($id);
        $listImages = ListImage::where('room_type_id', $roomType->room_type_id)->get();
        foreach ($listImages as $image) {
            $path = 'public/image/' . $image->link;
            File::delete($path);
            $image->delete();
        }
        $path = 'public/image/' . $roomType->avatar;
        File::delete($path);
        $roomType->delete();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Xóa loại phòng thành công!!!']);
    }

}
