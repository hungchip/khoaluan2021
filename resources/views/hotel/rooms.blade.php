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
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @if(count($roomTypes) > 0)
                    @foreach($roomTypes as $roomType)
                    <div class="col-md-6 padding-room">
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
                            <a href="{{route('showStepOne')}}">
                                <button>Đặt phòng ngay</button>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12">
                        <p class="no-result">Không có kết quả nào</p>
                    </div>
                    @endif
                </div>
            </div>
            {{-- aside --}}
            <div class="col-md-3">
                <aside>
                    <div class="blog-search">
                        <form action="{{route('showPageRoom')}}" class="form-search" method="get">
                            <input name="data" type="text" placeholder="Tìm kiếm... ">
                            <button class="btn btn-form-search"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="new-post">
                        <p class="new-post-title">Loại phòng thượng hạng</p>
                        <div class="is-divider"></div>
                        <ul class="list-new-post">
                            @foreach ($specialRooms as $specialRoom)
                            <li class="new-post-item">
                                <a href="{{route('showDetailRoom',$specialRoom->room_type_id)}}">
                                    <div class="new-post-row clearfix">
                                        <div class="special-room-item">
                                            <img src="{{asset('public/image/')}}/{{$specialRoom->avatar}}" alt="">
                                        </div>
                                        <p class="post-title">{{$specialRoom->room_type_name}}</p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
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