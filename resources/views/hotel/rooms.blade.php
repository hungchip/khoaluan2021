@extends('hotel.layouts.default')

@section('content')
<!-- banner  -->
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Rooms</p>
    </div>
</section>

<!-- end banner  -->

<!-- content -->
<section class="content">
    <div class="container">
        <div class="over-view">
            <p>
                223 rooms and suites from standard to premium levels are set up harmonizingly within the hotel area. All
                rooms feature exclusive facilities, airy space and romantic balcony offering views of magnificent
                natural scenery of the Tay Bac region.
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
                        <p>Price <span>{{number_format($roomType->room_type_price)}}</span> VND/Day</p>
                        <a href="">
                            <button>Book now</button>
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