@extends('hotel.booking')

@section('form-booking')
<form action="">
    <div class="booking-step">
        <div class="booking-step-title ">
            1. <span>Chọn ngày</span>
        </div>
        <div class="booking-step-title ">
            2. <span>Chọn phòng</span>
        </div>
        <div class="booking-step-title ">
            3. <span>Chọn phương thức thanh toán</span>
        </div>
        <div class="booking-step-title current">
            4. <span>Hoàn tất</span>
        </div>
    </div>
    <div class="booking-side">
        <h4 class="sb-title">Your Reservation</h4>
        <ul>
            <li><span>Check In: </span>{{date('d/m/Y', strtotime($arr['t_start']))}}</li>
            <li><span>Check Out: </span>{{date('d/m/Y', strtotime($arr['t_end']))}}</li>
        </ul>
        @for($i = 0; $i < $roomAmount; $i++) <h4 class="sb-title">Room {{$i + 1}} of {{$roomAmount}}
            {{-- <a href="" class="btn btn-edit">edit</a> --}}
            </h4>
            <ul>
                <li><span>Room: {{$roomType->room_type_name}}</span></li>
                <li><span>Guest: </span>
                    <span class="guest-wrapper">
                        <span>Adult {{$roomAdult[$i]}}</span>,
                        <span> Child {{$roomChild[$i]}}</span>
                    </span>
                </li>
            </ul>
            @endfor
        {{-- <h4 class="sb-title">Room 2 of 2</h4>
        <ul>
            <li><span>Room:</span> Standard Room</li>
            <li><span>Guest: </span>
                <span class="guest-wrapper">
                    <span>Adult 2</span>,
                    <span> Child 1</span>
                </span>
            </li>
        </ul> --}}
        {{-- <h4 class="sb-title">Additional Fees</h4>
        <ul>
            <li><span>Airport transfer:</span> 1</li>
            <li><span>Room cleaning fee:</span> 1</li>
            <li><span>Add any custom service:</span> 1</li>
        </ul> --}}
        <div class="price-detail">
            <p class="deposite-notice">Tổng giá</p>
            <h3 class="deposite-price">{{number_format($roomType->room_type_price * $roomAmount)}} VND</h3>
            {{-- <hr>
            <p class="total-notice">Total price</p>
            <h3 class="total-price">$1,000,</h3> --}}
            {{-- <p class="detail"><a href="">Detail</a></p> --}}
        </div>
        <!-- <button>Edit Booking</button> -->
    </div>
    <div class="booking-main">
        <h4 class="sb-title">Reservation Complete</h4>
        <p>Thank you for booking</p>
    </div>
    <div class="clearfix">

    </div>

</form>

@endsection