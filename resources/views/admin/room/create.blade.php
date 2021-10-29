@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
    {{-- For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="p-3">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tạo phòng mới</h1>
            </div>
            <form action="{{route('room.store')}}" class="user" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Loại phòng</label>
                        <select name="roomType" id="" class="form-control form-control-user" style="padding: 0px 20px;">
                            @foreach($roomTypes as $roomType)
                            <option class="" value="{{$roomType->room_type_id}}">{{$roomType->room_type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control form-control-user" style="padding: 0px 20px;" id="amount"
                            placeholder="số lượng" name="amount" value="1">
                        <span class="error-message text-danger">{{$errors->first('amount')}}</span></p>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Thêm mới
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

    .pd-0 {
        padding: 0;
    }
</style>
@endsection