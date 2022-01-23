@extends('hotel.booking')

@section('form-booking')

<div>
    @csrf
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
    <div class="booking-main">
        <h4 class="sb-title">Đặt phòng hoàn tất</h4>
        <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Đơn đặt phòng đã được gửi đến đỉa chỉ Email của bạn. <span
                class="text-danger">Bạn vui lòng xác nhận và thanh toán tiền đặt cọc trong vòng 48h nếu ko đơn đặt phòng
                của bạn sẽ bị hủy.</span></p>

    </div>
    <div class="clearfix">

    </div>

</div>

@endsection

@section('js')
<script>
    // $('form').submit(false);
    // if ( window.history.replaceState ) {
    //     window.history.replaceState( null, null, window.location.href );
    // }
</script>
@endsection