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

    <form action="">
        <?php 
        $totalPrice = 0;
        $start = new DateTime($arr['t_start']);
        $end = new DateTime($arr['t_end']);

        $abs_diff = $end->diff($start)->format("%a");
        ?>

        <input type="hidden" name="t_start" value="{{$arr['t_start']}}">
        <input type="hidden" name="t_end" value="{{$arr['t_end']}}">
        {{-- <input type="hidden" name="room_adult" value="{{$arr['room_adult']}}"> --}}
        {{-- <input type="hidden" name="room_child" value="{{$arr['room_child']}}"> --}}
        {{-- <input type="hidden" name="room_type_id" value="{{$roomType->room_type_id}}"> --}}
        <h4 class="sb-title">Đặt phòng ({{$abs_diff}} đêm)</h4>
        <ul>
            <li><span>Check In: </span>{{date('d/m/Y', strtotime($arr['t_start']))}}</li>
            <li><span>Check Out: </span>{{date('d/m/Y', strtotime($arr['t_end']))}}</li>
        </ul>

        @for($i = 0; $i < $roomAmount; $i++) <h4 class="sb-title">Phòng {{$i + 1}} / {{$roomAmount}}</h4>
            <ul>
                <li>
                    <span>Loại phòng:
                        @foreach($roomTypes as $roomType)
                        @if($roomType->room_type_id == $roomTypeId[$i])
                        {{$roomType->room_type_name}}
                        <?php 
                            $totalPrice += $roomType->room_type_price;
                        ?>
                        @endif
                        @endforeach
                    </span>
                </li>
                <li><span>Khách: </span>
                    <span class="guest-wrapper">
                        <span>Người lớn {{$roomAdult[$i]}}</span>,
                        <span> Trẻ em {{$roomChild[$i]}}</span>
                    </span>
                </li>
                <li><span>Giá: </span>
                    <span class="guest-wrapper">
                        @foreach($roomTypes as $roomType)
                        @if($roomType->room_type_id == $roomTypeId[$i])
                        <span>{{number_format($roomType->room_type_price)}} VND/đêm</span>
                        @endif
                        @endforeach
                    </span>
                </li>
            </ul>
            @endfor

            <div class="price-detail">
                <p class="deposite-notice">Tổng tiền</p>
                <h3 class="deposite-price">{{number_format($totalPrice * $abs_diff)}} VND</h3>
                <p class="deposite-notice">Cọc trước</p>
                <h3 class="total-price">{{number_format(($totalPrice * $abs_diff)/10)}} VND</h3>
            </div>
    </form>
</div>
<form action="{{route('storeBooking')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="booking-main">
        <input type="hidden" name="t_start" value="{{$arr['t_start']}}">
        <input type="hidden" name="t_end" value="{{$arr['t_end']}}">
        <input type="hidden" name="room_amount" value="{{$roomAmount}}">
        @for($i = 0; $i < $roomAmount; $i++) <input type="hidden" name="room_adult[]" value="{{$roomAdult[$i]}}">
            <input type="hidden" name="room_child[]" value="{{$roomChild[$i]}}">
            <input type="hidden" name="room_type_id[]" value="{{$roomTypeId[$i]}}">
            @endfor
            <div class="wrap-3">
                <div class="field-third">
                    <label for="name">Tên <span class="required text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{old('name')}}">
                    <p><span class="error-message text-danger">{{$errors->first('name')}}</span></p>
                </div>
                <div class="field-third">
                    <label for="email">Email <span class="required text-danger">*</span></label>
                    <input type="email" name="email" id="email" value="{{old('email')}}">
                    <p><span class="error-message text-danger">{{$errors->first('email')}}</span></p>
                </div>
                <div class="field-third">
                    <label for="idcard">CMND <span class="required text-danger">*</span></label>
                    <input type="tel" pattern="[0-9]*" name="idcard" id="idcard" value="{{old('idcard')}}">
                    <p><span class="error-message text-danger">{{$errors->first('idcard')}}</span></p>
                </div>
            </div>
            <div class="wrap-2">
                <div class="field-half">
                    <label for="address">Địa chỉ <span class="required text-danger">*</span></label>
                    <input type="text" name="address" id="address" value="{{old('address')}}">
                    <p><span class="error-message text-danger">{{$errors->first('address')}}</span></p>
                </div>

                <div class="field-half">
                    <label for="phone">Điện thoại <span class="required text-danger">*</span></label>
                    <input type="tel" pattern="[0-9]*" name="phone" id="phone" value="{{old('phone')}}">
                    <p><span class="error-message text-danger">{{$errors->first('phone')}}</span></p>
                </div>
            </div>

            {{--
            <hr style="width: 100%;">
            <h4 class="sb-title">Apply Coupon</h4>
            <div class="add-coupon">
                <input type="text" name="coupon" value="">
                <button>Apply Coupon</button>
            </div> --}}
            <hr style="width: 100%;">
            <h4 class="sb-title">Chọn phương thức thanh toán</h4>
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
                    <input type="radio" name="paymentMethod" value="payOnArrival" checked id="pay_on_arrival">
                    <label for="pay_on_arrival">Pay On Arrival</label>
                </p>
            </div>
            <button>Đặt phòng</button>
    </div>
</form>
<div class="clearfix">

</div>


@endsection