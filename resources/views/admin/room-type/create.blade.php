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
                <h1 class="h4 text-gray-900 mb-4">Tạo loại phòng mới</h1>
            </div>
            <form action="{{route('roomType.store')}}" class="user" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="" placeholder="Tên loại phòng"
                            name="name" value="{{old('name')}}">
                        <span class="error-message text-danger">{{$errors->first('name')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control form-control-user" id="" placeholder="Giá"
                            name="price" value="{{old('price')}}">
                        <span class="error-message text-danger">{{$errors->first('price')}}</span></p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="" placeholder="Mô tả ngắn"
                            name="quote" value="{{old('quote')}}">
                        <span class="error-message text-danger">{{$errors->first('quote')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="" placeholder="Mô tả"
                            name="description" value="{{old('description')}}">
                        <span class="error-message text-danger">{{$errors->first('description')}}</span></p>
                    </div>
                    
                    <div class="col-sm-6 mb-3 mb-sm-0  ">
                        <label for="avatar"> Ảnh đại diện</label>
                        <input type="file" accept="image/*" class="form-control form-control-user" id="avatar" name="avatar">
                        <span class="error-message text-danger">{{$errors->first('avatar')}}</span></p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0  ">
                        <label for="listImage"> Danh sách ảnh  </label>
                        <input type="file" class="form-control form-control-user" id="listImage" name="listImage[]" accept="image/*" multiple="multiple">
                        <span class="error-message text-danger">{{$errors->first('listImage')}}</span></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="info"> Thông tin</label>
                    <textarea name="info" id="test" rows="5">{{old('info')}}</textarea>
                    <span class="error-message text-danger">{{$errors->first('info')}}</span></p>
                </div>
                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Thêm mới
                </button>
                <a href="{{route('roomType.index')}}" class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
                    Quay lại
                </a>
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