@extends('hotel.booking')

@section('form-booking')


<div class="booking-step">
    <div class="booking-step-title ">
        1. <span>Chọn ngày</span>
    </div>
    <div class="booking-step-title current">
        2. <span>Chọn phòng</span>
    </div>
    <div class="booking-step-title ">
        3. <span>Chọn phương thức thanh toán</span>
    </div>
    <div class="booking-step-title ">
        4. <span>Hoàn tất</span>
    </div>
</div>
<form action="{{route('showStepTwo')}}">
    <input type="hidden" name="t_start" value="{{$arr['t_start']}}">
    <input type="hidden" name="t_end" value="{{$arr['t_end']}}">
    <input type="hidden" name="room_adult" value="{{$arr['room_adult']}}">
    <input type="hidden" name="room_child" value="{{$arr['room_child']}}">
    <div class="booking-side">
        <h4 class="sb-title">Đặt phòng</h4>
        <ul>
            <li><span>Check In: </span>{{date('d/m/Y', strtotime($arr['t_start']))}}</li>
            <li><span>Check Out: </span>{{date('d/m/Y', strtotime($arr['t_end']))}}</li>
        </ul>
        @for($i = 0; $i < $roomAmount; $i++)
        <h4 class="sb-title">Phòng {{$i + 1}} / {{$roomAmount}}
            {{-- <a href="" class="btn btn-edit">edit</a> --}}
        </h4>
        <ul>
            <li><span>Loại phòng: </span></li>
            <li><span>Khách: </span>
                <span class="guest-wrapper">
                    <span>Người lớn {{$roomAdult[$i]}}</span>,
                    <span> Trẻ em {{$roomChild[$i]}}</span>
                </span>
            </li>
        </ul>
        @endfor
        {{-- <h4 class="sb-title">Room 2 of 2
            <a href="" class="btn btn-edit">edit</a>
        </h4>
        <ul>
            <li><span>Room:</span> Standard Room</li>
            <li><span>Guest: </span>
                <span class="guest-wrapper">
                    <span>Adult 2</span>,
                    <span> Child 1</span>
                </span>
            </li>
        </ul> --}}
        <button>Edit Room & Guest Quantity</button>
    </div>
</form>
<div class="booking-main">
    <form action="{{route('showStepFour')}}">
        <input type="hidden" name="t_start" value="{{$arr['t_start']}}">
        <input type="hidden" name="t_end" value="{{$arr['t_end']}}">
        <input type="hidden" name="room_adult" value="{{$arr['room_adult']}}">
        <input type="hidden" name="room_child" value="{{$arr['room_child']}}">
        <input type="hidden" name="room_type_id" value="{{$roomType->room_type_id}}">
        <div class="booking-service">
            <input type="checkbox" name="service1" value="breakfast" id="breakfast">
            <label for="breakfast">Breakfast<span>(free)</span></label>
        </div>
        <div class="booking-service">
            <input type="checkbox" name="service2" value="clean" id="clean">
            <label for="clean">Daily Clean Up<span>(free)</span></label>
        </div>
        <div class="booking-service">
            <input type="checkbox" name="service3" value="shuttle" id="shuttle">
            <label for="shuttle">Shuttle<span>(free)</span></label>
        </div>
        <button>Continue to payment</button>
    </form>
</div>
<div class="clearfix">

</div>


@endsection

@section('css')
<style>
    .booking-service {
        display: flex;
        align-items: center;
    }
</style>
@endsection