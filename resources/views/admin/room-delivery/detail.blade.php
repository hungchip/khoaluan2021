@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-dark">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
{{-- For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="p-3">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Chi tiết loại phòng </h1>
            </div>
            <form action="" class="user" method="post" enctype="multipart/form-data">

                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <h4 class=" mb-2 text-dark">Tên loại phòng</h4>
                        <p> {{$roomType->room_type_name}}</p>
                    </div>
                    <div class="col-sm-6">
                        <h4 class=" mb-2 text-dark">Giá</h4>
                        <p> {{number_format($roomType->room_type_price)}}</p>
                    </div>
                    <div class="col-sm-12">
                        <h4 class=" mb-2 text-dark">Mô tả ngắn</h4>
                        <p> {{$roomType->quote}}</p>
                    </div>
                    
                    <div class="col-sm-12">
                        <h4 class=" mb-2 text-dark">Mô tả
                        </h4>
                        <p> {{$roomType->room_type_desc}}</p>
                    </div>
                    <div class="col-sm-12 ">
                        <h4 class=" mb-2 text-dark">Ảnh đại diện</h4>
                        <img src="{{asset('public/image/')}}/{{$roomType->avatar}}" alt="" width="300">
                        
                    </div>
                    <div class="col-sm-12  ">
                        <h4 class=" mb-2 text-dark">Danh sách ảnh</h4>
                        @foreach ($listImages as $image)
                        <img src="{{asset('public/image/')}}/{{$image->link}}" alt="" width="200">
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <h4 class=" mb-2 text-dark">Thông tin</h4>
                    <p name="info" id="" rows="5">{!!$roomType->room_type_info!!}</p>
                    <span class="error-message text-danger">{{$errors->first('info')}}</span></p>
                </div>
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