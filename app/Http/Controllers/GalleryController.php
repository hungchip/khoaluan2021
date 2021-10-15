<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallery::all();
        return view('admin.gallerys.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallerys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'image.*' => 'required|file|image|max:2000',
            ],
            [
                'image.required' => 'Ảnh không được để trống',
                'image.image' => 'Dữ liệu không đúng định dạng',
                'image.max' => 'Dung lượng ảnh tối đa là 2MB',
            ]
        );

        $images = $request->file('image');
        foreach ($images as $image) {
            $gallery = new Gallery();
            $getImageName = $image->getClientOriginalName();
            $imageName = current(explode('.', $getImageName));
            $newImage = $imageName . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/image/gallery', $newImage);
            $gallery->image = $newImage;
            $gallery->save();
        }

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm hình ảnh thành công!!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallerys.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $gallery = Gallery::find($id);
        $path = 'public/image/gallery/' . $gallery->image;
        File::delete($path);
        $gallery->delete();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Xóa loại phòng thành công!!!']);
    }
}
