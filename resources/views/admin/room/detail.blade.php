@extends('admin.default.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="p-3">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Chi tiết phòng </h1>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <h4 class=" mb-2 text-dark">Tên loại phòng</h4>
                    <p> {{$roomType->room_type_name}}</p>
                </div>
                <div class="col-md-6">
                    <h4 class=" mb-2 text-dark">Số phòng</h4>
                    <p> {{$room->room_number}}</p>
                </div>
            </div>

            <a href="{{route('room.index')}}" class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
                Quay lại
            </a>
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