@extends('hotel.booking')

@section('form-booking')

<div class="booking-step">
    <div class="booking-step-title ">
        1. <span>Chọn ngày</span>
    </div>
    <div class="booking-step-title ">
        2. <span>Chọn phòng</span>
    </div>
    <div class="booking-step-title current">
        3. <span>Chọn phương thức thanh toán</span>
    </div>
    <div class="booking-step-title ">
        4. <span>Hoàn tất</span>
    </div>
</div>
<div class="booking-side">
    <form action="{{route('showStepThree')}}">
        <input type="hidden" name="t_start" value="{{$arr['t_start']}}">
        <input type="hidden" name="t_end" value="{{$arr['t_end']}}">
        {{-- <input type="hidden" name="room_adult" value="{{$arr['room_adult']}}"> --}}
        {{-- <input type="hidden" name="room_child" value="{{$arr['room_child']}}"> --}}
        <input type="hidden" name="room_type_id" value="{{$roomType->room_type_id}}">
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
            {{-- <h4 class="sb-title">Additional Fees</h4>
            <ul>
                <li><span>Breakfast: </span>{{($arr['breakfast']) ? 'Yes' : 'No'}}</li>
                <li><span>Daily Clean Up: </span>{{($arr['clean']) ? 'Yes' : 'No'}}</li>
                <li><span>Shuttle: </span>{{($arr['shuttle']) ? 'Yes' : 'No'}}</li>
            </ul> --}}
            <div class="price-detail">
                <p class="deposite-notice">Total price</p>
                <h3 class="deposite-price">{{$room_type_price * $roomAmount}}vnd</h3>
                {{-- <hr>
                <p class="total-notice">Total price</p>
                <h3 class="total-price">$1,000,</h3> --}}
                {{-- <p class="detail"><a href="">Detail</a></p> --}}
            </div>
            {{-- <button>Edit Booking</button> --}}
    </form>
</div>
<form action="{{route('showFinalStep')}}">
    <div class="booking-main">

        <input type="hidden" name="t_start" value="{{$arr['t_start']}}">
        <input type="hidden" name="t_end" value="{{$arr['t_end']}}">
        @for($i = 0; $i < $roomAmount; $i++) 
            <input type="hidden" name="room_adult[]" value="{{$roomAdult[$i]}}">
            <input type="hidden" name="room_child[]" value="{{$roomChild[$i]}}">
        @endfor
            <input type="hidden" name="room_amount" value="{{$roomAmount}}">
            <input type="hidden" name="room_type_id" value="{{$roomType->room_type_id}}">
            <div class="field-half">
                <label for="">Tên <span class="required">*</span></label>
                <input type="text" name="name" id="name">
                <p><span class="error-message text-danger">{{$errors->first('name')}}</span></p>
            </div>
            <div class="field-half">
                <label for="">Địa chỉ <span class="required">*</span></label>
                <input type="text" name="address" id="address">
                <p><span class="error-message text-danger">{{$errors->first('address')}}</span></p>
            </div>
            <div class="field-half">
                <label for="">Email <span class="required">*</span></label>
                <input type="email" name="email" id="email">
                <p><span class="error-message text-danger">{{$errors->first('email')}}</span></p>
            </div>
            <div class="field-half">
                <label for="">Phone <span class="required">*</span></label>
                <input type="number" name="phone" id="phone">
                <p><span class="error-message text-danger">{{$errors->first('phone')}}</span></p>
            </div>
            <div class="clearfix"></div>
            <hr style="width: 100%;">
            <h4 class="sb-title">Apply Coupon</h4>
            <div class="add-coupon">
                <input type="text" name="coupon" value="">
                <button>Apply Coupon</button>
            </div>
            <hr style="width: 100%;">
            <h4 class="sb-title">Select Payment Method</h4>
            <div class="payment-method">
                <p>
                    <input type="radio" name="paymentMethod" value="credit" id="credit_card">
                    <label for="credit_card">Credit card</label>
                </p>
                <p>
                    <input type="radio" name="paymentMethod" value="bank" id="bank_transfer">
                    <label for="bank_transfer">Bank transfer</label>
                </p>
                <p>
                    <input type="radio" name="paymentMethod" value="payOnArrival" id="pay_on_arrival">
                    <label for="pay_on_arrival">Pay On Arrival</label>
                </p>
            </div>
            <button>Continue to payment</button>
    </div>
</form>
<div class="clearfix">

</div>


@endsection