@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
{{-- For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="p-3">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa dịch vụ </h1>
            </div>
            <form action="{{route('service.update',$service->service_id)}}" class="user" method="post"
                enctype="multipart/form-data">
                
                @csrf
                @method('put')
                
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Tên ịch vụ</label>
                        <input type="text" class="form-control form-control-user" id=""
                            value="{{$service->service_name}}" name="name">
                        <span class="error-message text-danger">{{$errors->first('name')}}</span></p>
                    </div>
                    <div class="col-sm-12">
                        <label for="">Giá</label>
                        <input type="number" class="form-control form-control-user" id=""
                            value="{{$service->service_price}}" name="price">
                        <span class="error-message text-danger">{{$errors->first('price')}}</span></p>
                    </div>
                    <div class="col-sm-12">
                        <label for="">Đơn vị</label>
                        <input type="text" class="form-control form-control-user" id=""
                            value="{{$service->unit}}" name="unit">
                        <span class="error-message text-danger">{{$errors->first('unit')}}</span></p>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    .mg-0-auto {
        margin: 0 auto;
    }

    textarea {
        width: 100%;
        resize: none;
        border-radius: none;
        border-color: #d1d3e2;
    }

    textarea:focus {
        outline: none;
    }


    /* disable arrow */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection