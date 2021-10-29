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
            <li><span>Check In: </span>02/04/1998</li>
            <li><span>Check Out: </span>02/04/1998</li>
        </ul>
        {{-- <h4 class="sb-title">Room 1 of 2</h4> --}}
        <ul>
            <li><span>Room:</span> Standard Room</li>
            <li><span>Guest: </span>
                <span class="guest-wrapper">
                    <span>Adult 2</span>,
                    <span> Child 1</span>
                </span>
            </li>
        </ul>
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
        <h4 class="sb-title">Additional Fees</h4>
        <ul>
            <li><span>Airport transfer:</span> 1</li>
            <li><span>Room cleaning fee:</span> 1</li>
            <li><span>Add any custom service:</span> 1</li>
        </ul>
        <div class="price-detail">
            <p class="deposite-notice">Total price</p>
            <h3 class="deposite-price">$1,000,</h3>
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