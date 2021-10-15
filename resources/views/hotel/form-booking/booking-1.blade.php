<!-- booking side -->
<div class="booking-side ">
    <div class="booking-side-1">
        <h4 class="sb-title">Your Reservation</h4>
        <ul>
            <li><span>Check In: </span>{{$arr[2]}}</li>
            <li><span>Check Out: </span>{{$arr[3]}}</li>
            <input type="hidden" name="check_in" value="{{$arr[2]}}">
            <input type="hidden" name="check_out" value="{{$arr[3]}}">
        </ul>
        <h4 class="sb-title">
            <a href="" class="btn btn-edit">edit</a>
        </h4>
        <ul>
            <li><span>Room:</span></li>
            <li><span>Guest: </span>
                <span class="guest-wrapper">
                    <span>Adult {{$arr[0]}}</span>,
                    <span> Child {{$arr[1]}}</span>
                    <input type="hidden" name="adult" value="{{$arr[0]}}">
                    <input type="hidden" name="child" value="{{$arr[1]}}">
                </span>
            </li>
        </ul>
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
        {{-- <button id="btn-edit-room">Edit Room & Guest Quantity</button> --}}
    </div>
</div>
<!-- booking main -->
<div class="booking-main">
    <div class="booking-main-1">
        <div class="list-booking-room">
            @foreach($roomTypes as $roomType)
            <div class="booking-room-warraper">
                <div class="booking-room-image"><img src="{{asset('public/image/')}}/{{$roomType->avatar}}" alt="">
                </div>
                <div class="booking-room-content">
                    <h4>
                        <a href="{{route('showDetailRoom',$roomType->room_type_id)}}">{{$roomType->room_type_name}}</a>
                    </h4>
                    {{-- <ul>
                        <li><span>Max Occupancy: </span> 2 Persons</li>
                        <li><span>Size: </span> 35-40sqm</li>
                        <li><span>View: </span>City</li>
                    </ul> --}}
                    {!!$roomType->room_type_info!!}
                    <div class="booking-room-action">
                        <button id="vuviethugn" class="btn-select vuviethugn">Select room</button>
                        <div class="price"><span>price</span> {{number_format($roomType->room_type_price)}} VND</div>
                    </div>
                </div>
                <input type="hidden" name="room_type" value="{{$roomType->room_type_id}}">
            </div>
            @endforeach
        </div>
    </div>
</div>