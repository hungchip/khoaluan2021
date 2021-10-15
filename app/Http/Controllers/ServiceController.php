<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
                'name' => 'required',
                'price' => 'required|numeric|min:0',
                'unit' => 'required',
            ],
            [
                'name.required' => 'Tên dịch vụ không được để trống',
                'price.required' => 'Giá dịch vụ không được để trống',
                'price.numeric' => 'Giá không đúng định dạng',
                'price.min' => 'Giá không đúng định dạng',
                'unit.required' => 'Đơn vị không được để trống'
            ]
        );

        $service = new Service();
        $service->service_name = $request->name;
        $service->service_price = $request->price;
        $service->unit = $request->unit;
        $service->save();

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Thêm dịch vụ thành công !!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $service = Service::find($id);

        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required|numeric|min:0',
                'unit' => 'required',
            ],
            [
                'name.required' => 'Tên dịch vụ không được để trống',
                'price.required' => 'Giá dịch vụ không được để trống',
                'price.numeric' => 'Giá không đúng định dạng',
                'price.min' => 'Giá không đúng định dạng',
                'unit.required' => 'Đơn vị không được để trống'
            ]
        );

        $service = Service::find($id);
        $service->service_name = $request->name;
        $service->service_price = $request->price;
        $service->unit = $request->unit;
        $service->save();

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Sửa dịch vụ thành công !!!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Xóa dịch vụ thành công!!!']);
    }
}
