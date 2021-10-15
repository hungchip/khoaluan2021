@extends('hotel.layouts.default')
@section('content')
<!-- banner  -->
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Booking</p>
    </div>
</section>

<!-- end banner  -->

<!-- content -->
<section class="content">
    <div class="container">
        <form id="form-booking" method="get">
            {{-- @method('post') --}}
            @csrf
            <div class="booking-step">
                <div class="booking-step-title">
                    1. <span>Select Date</span>
                </div>
                <div class="booking-step-title ">
                    2. <span>Select Room</span>
                </div>
                <div class="booking-step-title ">
                    3. <span>Select Payment</span>
                </div>
                <div class="booking-step-title ">
                    4. <span>Complete</span>
                </div>
            </div>
            {{-- booking side --}}
            {{-- booking side 1 --}}
            <div class="booking-side">
                <h4>Your Reservation</h4>
                {{-- <label for="">Room</label>
                <select name="room_amount" id="room_amount">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select> --}}
                <div class="rooms-wrapper">
                    <div class="room-item">
                        {{-- <p>Room 1</p> --}}
                        <div class="guest-col">
                            <label for="">Adult</label>
                            <select name="room_adult" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="guest-col">
                            <label for="">Child</label>
                            <select name="room_child" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="room-item">
                        <p>Room 2</p>
                        <div class="guest-col">
                            <label for="">Adult</label>
                            <select name="room_2_adult" id="">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                            </select>
                        </div>
                        <div class="guest-col">
                            <label for="">Child</label>
                            <select name="room_2_child" id="">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <button id="btn-search">Search</button>
            </div>
            {{-- booking side 2--}}
            {{-- <div class="booking-side">
                <h4 class="sb-title">Your Reservation</h4>
                <ul>
                    <li><span>Check In: </span>02/04/1998</li>
                    <li><span>Check Out: </span>02/04/1998</li>
                </ul>
                <h4 class="sb-title">Room 1 of 2
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
                </ul>
                <h4 class="sb-title">Room 2 of 2
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
                </ul>
                <button>Edit Room & Guest Quantity</button>
            </div> --}}
            {{-- booking side 3 --}}
            {{-- <div class="booking-side">
                <h4 class="sb-title">Your Reservation</h4>
                <ul>
                    <li><span>Check In: </span>02/04/1998</li>
                    <li><span>Check Out: </span>02/04/1998</li>
                </ul>
                <h4 class="sb-title">Room 1 of 2
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
                </ul>
                <h4 class="sb-title">Room 2 of 2
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
                </ul>
                <button>Edit Room & Guest Quantity</button>
            </div> --}}
            {{-- booking side 4 --}}
            {{-- <div class="booking-side">
                <h4 class="sb-title">Your Reservation</h4>
                <ul>
                    <li><span>Check In: </span>02/04/1998</li>
                    <li><span>Check Out: </span>02/04/1998</li>
                </ul>
                <h4 class="sb-title">Room 1 of 2
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
                </ul>
                <h4 class="sb-title">Room 2 of 2
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
                </ul>
                <h4 class="sb-title">Additional Fees</h4>
                <ul>
                    <li><span>Airport transfer:</span> 1</li>
                    <li><span>Room cleaning fee:</span> 1</li>
                    <li><span>Add any custom service:</span> 1</li>
                </ul>
                <div class="price-detail">
                    <p class="deposite-notice">100% Deposite Due</p>
                    <h3 class="deposite-price">$1,000,</h3>
                    <hr>
                    <p class="total-notice">Total price</p>
                    <h3 class="total-price">$1,000,</h3>
                    <p class="detail"><a href="">Detail</a></p>
                </div>
                <button>Edit Booking</button>
            </div> --}}
            {{-- booking side 5 --}}
            {{-- <div class="booking-side">
                <h4 class="sb-title">Your Reservation</h4>
                <ul>
                    <li><span>Check In: </span>02/04/1998</li>
                    <li><span>Check Out: </span>02/04/1998</li>
                </ul>
                <h4 class="sb-title">Room 1 of 2
                    <!-- <a href="" class="btn btn-edit">edit</a> -->
                </h4>
                <ul>
                    <li><span>Room:</span> Standard Room</li>
                    <li><span>Guest: </span>
                        <span class="guest-wrapper">
                            <span>Adult 2</span>,
                        <span> Child 1</span>
                        </span>
                    </li>
                </ul>
                <h4 class="sb-title">Room 2 of 2
                    <!-- <a href="" class="btn btn-edit">edit</a> -->
                </h4>
                <ul>
                    <li><span>Room:</span> Standard Room</li>
                    <li><span>Guest: </span>
                        <span class="guest-wrapper">
                            <span>Adult 2</span>,
                        <span> Child 1</span>
                        </span>
                    </li>
                </ul>
                <h4 class="sb-title">Additional Fees</h4>
                <ul>
                    <li><span>Airport transfer:</span> 1</li>
                    <li><span>Room cleaning fee:</span> 1</li>
                    <li><span>Add any custom service:</span> 1</li>
                </ul>
                <div class="price-detail">
                    <p class="deposite-notice">100% Deposite Due</p>
                    <h3 class="deposite-price">$1,000,</h3>
                    <hr>
                    <p class="total-notice">Total price</p>
                    <h3 class="total-price">$1,000,</h3>
                    <p class="detail"><a href="">Detail</a></p>
                </div>
                <button>Edit Booking</button> 
            </div> --}}
            {{-- end booking site --}}
            {{-- booking main --}}
            <div class="booking-main">
                <div class="t-datepicker datepicker-2">
                    <div class="t-check-in t-picker-only">
                        <div class="t-dates t-date-check-in ">
                            <label class="t-date-info-title">Check In</label>
                        </div>
                        <input type="hidden" class="t-input-check-in" value="" name="t_start">
                        <div class="t-datepicker-day" style="display: block;">
                            <table class="t-table-condensed">
                                <!-- Date theme calendar -->
                            </table>
                        </div>
                    </div>
                    <div class="t-check-out t-picker-only">
                        <div class="t-dates t-date-check-out">
                            <label class="t-date-info-title">Check Out</label>
                        </div>
                        <input type="hidden" class="t-input-check-out" value="" name="t_end">
                    </div>
                </div>
            </div>
            {{-- booking main 1 --}}
            {{-- <div class="booking-main">
                <div class="list-booking-room">
                    <div class="booking-room-warraper">
                        <div class="booking-room-image"><img src="assets/images/room-02.jpeg" alt=""></div>
                        <div class="booking-room-content">
                            <h4>
                                <a href="">Standard room</a>
                            </h4>
                            <ul>
                                <li><span>Max Occupancy: </span> 2 Persons</li>
                                <li><span>Size: </span> 35-40sqm</li>
                                <li><span>View: </span>City</li>
                            </ul>
                            <div class="booking-room-action">
                                <button>Select room</button>
                                <div class="price"><span>price</span> 150$</div>
                            </div>
                        </div>
                    </div>
                    <div class="booking-room-warraper">
                        <div class="booking-room-image"><img src="assets/images/room-02.jpeg" alt=""></div>
                        <div class="booking-room-content">
                            <h4>
                                <a href="">Standard room</a>
                            </h4>
                            <ul>
                                <li><span>Max Occupancy: </span> 2 Persons</li>
                                <li><span>Size: </span> 35-40sqm</li>
                                <li><span>View: </span>City</li>
                            </ul>
                            <div class="booking-room-action">
                                <button>Select room</button>
                                <div class="price"><span>price</span> 150$</div>
                            </div>
                        </div>
                    </div>
                    <div class="booking-room-warraper">
                        <div class="booking-room-image"><img src="assets/images/room-02.jpeg" alt=""></div>
                        <div class="booking-room-content">
                            <h4>
                                <a href="">Standard room</a>
                            </h4>
                            <ul>
                                <li><span>Max Occupancy: </span> 2 Persons</li>
                                <li><span>Size: </span> 35-40sqm</li>
                                <li><span>View: </span>City</li>
                            </ul>
                            <div class="booking-room-action">
                                <button>Select room</button>
                                <div class="price"><span>price</span> 150$</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- booking main 2 --}}
            {{-- <div class="booking-main">
                <div class="booking-service">
                    <input type="checkbox">
                    <label for="">Breakfast <span>(free)</span></label>
                </div>
                <div class="booking-service">
                    <input type="checkbox">
                    <label for="">Breakfast <span>(free)</span></label>
                </div>
                <div class="booking-service">
                    <input type="checkbox">
                    <label for="">Breakfast <span>(free)</span></label>
                </div>
                <button>Continue to payment</button>
            </div> --}}
            {{-- booking main 3 --}}
            {{-- <div class="booking-main">
                <div class="field-half">
                    <label for="">First Name <span class="required">*</span></label>
                    <input type="text">
                </div>
                <div class="field-half">
                    <label for="">Last Name <span class="required">*</span></label>
                    <input type="text">
                </div>
                <div class="field-half">
                    <label for="">Email <span class="required">*</span></label>
                    <input type="email">
                </div>
                <div class="field-half">
                    <label for="">Phone <span class="required">*</span></label>
                    <input type="text">
                </div>
                <div class="clearfix"></div>
                <hr style="width: 100%;">
                <h4 class="sb-title">Apply Coupon</h4>
                <div class="add-coupon">
                    <input type="text">
                    <button>Apply Coupon</button>
                </div>
                <hr style="width: 100%;">
                <h4 class="sb-title">Select Payment Method</h4>
                <div class="payment-method">
                    <p>
                        <input type="radio" name="payment-method" value="" id="credit_card">
                        <label for="credit_card">Credit card</label>
                    </p>
                    <p>
                        <input type="radio" name="payment-method" value="" id="bank_transfer">
                        <label for="bank_transfer">Bank transfer</label>
                    </p>
                    <p>
                        <input type="radio" name="payment-method" value="" id="pay_on_arrival">
                        <label for="pay_on_arrival">Pay On Arrival</label>
                    </p>
                </div>
                <button>Continue to payment</button>
            </div> --}}
            {{-- booking main 4 --}}
            {{-- <div class="booking-main">
                <h4 class="sb-title">Reservation Complete</h4>
                <p>Thank you for booking</p>
            </div> --}}
            {{-- end booking main --}}
            <div class="clearfix">

            </div>

        </form>
    </div>
</section>
<!-- end content  -->
@endsection

@section('css')
<style>
    .banner {
        background-image: url('{{asset('public/hotel/images/room-01.jpeg')}}');
        height: 400px;
    }
</style>
@endsection

@section('js') 
<script>
    var currentTab = 0;
    // showTab(currentTab);
    function showTab(n) {
        // get list booking side
        var x =document.getElementsByClassName("booking-side");
        var y =document.getElementsByClassName("booking-main");
        x[n].style.display = "block";
        y[n].style.display = "block";
        fixStepIndicator(n);
    }

    function fixStepIndicator(n) {
        var i, x =document.getElementsByClassName("booking-step-title");
        for(i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" current", "");
        }
        x[n].className += " current";
    }

    function btnNext(n) {

    }
</script>
@endsection