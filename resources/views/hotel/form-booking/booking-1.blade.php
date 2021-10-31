@extends('hotel.booking')

@section('form-booking')
{{-- <form action="{{route('showStepThree')}}"> --}}
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
            </li>c
        </ul> --}}
        {{-- <a href="{{route('showStepOne')}}"><button>Edit Room & Guest Quantity</button></a> --}}
    </div>
    <div class="booking-main">
        <div class="list-booking-room">
            {{-- <input type="hidden" value="{{$count++}}"> --}}

            @foreach($roomTypes as $roomType)

            {{-- <form action="{{($count == $roomAmount) ? route('showStepThree') : route('showStepTwo')}}"> --}}
            <form action="{{route('showStepFour')}}">
                <input type="hidden" name="t_start" value="{{$arr['t_start']}}">
                <input type="hidden" name="t_end" value="{{$arr['t_end']}}">
                @for($i = 0; $i < $roomAmount; $i++) 
                <input type="hidden" name="room_adult[]" value="{{$roomAdult[$i]}}">
                <input type="hidden" name="room_child[]" value="{{$roomChild[$i]}}">
                @endfor
                <input type="hidden" name="room_type_id" value="{{$roomType->room_type_id}}">
                <input type="hidden" name="room_amount" value="{{$roomAmount}}">
                {{-- <input type="hidden" name="count" value="{{$count}}"> --}}
                <div class="booking-room-warraper">
                    <div class="booking-room-image"><img src="{{asset('public/image')}}/{{$roomType->avatar}}" alt="">
                    </div>
                    <div class="booking-room-content">
                        <h4>
                            <a href="{{route('showDetailRoom',$roomType->room_type_id)}}">{{$roomType->room_type_name}}</a>
                        </h4>
                        {!!$roomType->room_type_info!!}
                        <div class="booking-room-action">
                            <button class="btn-select btn-{{$roomType->room_type_id}}">Select room</button>
                            <div class="price"><span>price</span> {{number_format($roomType->room_type_price) }} VND
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
    <div class="clearfix">

    </div>

    {{--
</form> --}}
@endsection

@section('js')
<script>
    $(document).ready(function() {
    var listBtn = document.getElementsByClassName('btn-select');
    console.log(listBtn);
});
</script>
@endsection