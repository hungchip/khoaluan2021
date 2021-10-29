@extends('hotel.layouts.default')

@section('content')
<!-- banner  -->
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Các loại phòng</p>
    </div>
</section>

<!-- end banner  -->

<!-- content -->
<section class="content">
    <div class="container">
        <div class="over-view">
            <p>
                Tất cả các phòng từ tiêu chuẩn đến cao cấp được bố trí hài hòa trong khuôn viên khách sạn. Bên trong
                các phòng đều có tiện nghi độc quyền, không gian thoáng mát và ban công thơ mộng nhìn ra khung cảnh
                thiên nhiên hùng vĩ của vùng Tây Bắc.
            </p>
        </div>
        <div class="rooms">
            <div class="row">
                {{-- {{dd($roomTypes)}} --}}
                @foreach($roomTypes as $roomType)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-room">
                    <div class="room-image">
                        <a href="{{route('showDetailRoom',$roomType->room_type_id)}}">
                            <img src="{{asset('public/image/')}}/{{$roomType->avatar}}" alt="">
                        </a>
                    </div>
                    <div class="room-info">
                        <div class="room-info-title">
                            <a href="">{{$roomType->room_type_name}}</a>
                        </div>
                        <div class="room-info-desc">
                            <p>
                                {{$roomType->quote}}
                            </p>
                        </div>
                    </div>
                    <div class="room-price">
                        <p>Giá: <span>{{number_format($roomType->room_type_price)}}</span> VND/Ngày</p>
                        <a href="">
                            <button>Đặt phòng ngay</button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end content  -->
@endsection

@section('css')
<style>
    .banner {
        background-image: url('{{asset('public/hotel/images/room-banner.jpeg')}}');
        height: 400px;
    }
</style>
@endsection