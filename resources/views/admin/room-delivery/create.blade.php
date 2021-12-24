@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
    {{-- For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="p-3">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tạo Phiếu giao phòng</h1>
            </div>
            <form action="{{route('roomDelivery.store')}}" class="user" method="post">

                @csrf

                <input type="hidden" name="flag" value="">
                <div class="form-group row justify-content-center">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="hidden" name="bookingId" value="{{$booking->booking_id}}">
                        <p><span class="font-weight-bold">Mã đặt phòng:</span> {{$booking->booking_id}}</p>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="hidden" name="adminId" value="{{Auth::guard('admin')->user()->admin_id}}">
                        <p><span class="font-weight-bold">Lễ tân:</span> {{Auth::guard('admin')->user()->admin_name}}
                        </p>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="hidden" name="guestName" value="{{$booking->guest->guest_name}}">
                        <p><span class="font-weight-bold">Tên khách hàng:</span> {{$booking->guest->guest_name}}</p>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <p><span class="font-weight-bold">Ngày đến:</span>
                            {{date('d/m/Y',strtotime($booking->checkin))}}</p>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <p><span class="font-weight-bold">Ngày đi:</span>
                            {{date('d/m/Y',strtotime($booking->checkout))}}</p>
                    </div>
                </div>
                @foreach ($bookingDetails as $bookingDetail)
                <div class="booking-detail-box">
                    <div class="form-group row justify-content-center">
                        <div class="col-lg-2">Phòng {{$bookingDetail->no}}</div>
                        <div class="col-lg-2">Loại phòng: {{$bookingDetail->roomTypes->room_type_name}}</div>
                        <div class="col-lg-2">Người lớn: {{$bookingDetail->roomAdult}}</div>
                        <div class="col-lg-2">Trẻ em: {{$bookingDetail->roomChild}}</div>
                    </div>
                </div>
                @endforeach

                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Tạo
                </button>
                <a href="{{route('booking.index')}}" class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
                    Quay lại
                </a>
            </form>
            {{-- <form action="" method="get" class="user"
                style="margin-top:20px;">
                @csrf
                <button type="submit" class="btn btn-warning btn-user btn-block col-sm-3 mg-0-auto">
                    Kiểm tra
                </button>
            </form> --}}
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