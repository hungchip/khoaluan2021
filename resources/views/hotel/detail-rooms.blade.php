@extends('hotel.layouts.default')

@section('content')
<!-- banner  -->
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Room Type</p>
        <!-- <p class="intro-mid">Spend your holiday</p>
                <p class="intro-bot">Responsive and Elegant Design</p>
                <div class="stage">
                    <div class="icon-down box bounce-1"><a href="#welcome"><i class="fas fa-angle-down"></i></a></div>
                </div> -->

    </div>
</section>

<!-- end banner  -->

<!-- content -->
<section class="content">
    <div class="container">
        <!-- container info -->
        <div class="container-info">
            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="content-image">
                        @foreach($listImages as $image)
                        <img src="{{ asset('public/image/')}}/{{$image->link}}" alt="">
                        @endforeach
                    </div>
                    <div class="content-image-list">
                        <div class="list-image-carousel">
                            @foreach($listImages as $image)
                            <img src="{{ asset('public/image/')}}/{{$image->link}}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 content-info-right">
                    <h3 class="room-detail">{{$roomType->room_type_name}}</h3>
                    <p class="room-desc">
                        {{$roomType->room_type_desc}}
                    </p>
                    <strong>Facilities:</strong>
                    {!!$roomType->room_type_info!!}
                    <div class="content-price">
                        <p>Price:</p>
                        <strong>{{number_format($roomType->room_type_price)}} VNĐ</strong>
                    </div>
                    <a href=""><button>BOOK NOW</button></a>
                </div>

            </div>
        </div>
        <!-- end container info -->
        <!-- container carousel -->
        <div class="container-carousel">
            <h3 class="container-carousel-h3">Room Article</h3>
            <div class="carousel-hook">
                @foreach ($roomTypes as $room)
                <div class="carousel-hook-item">
                    <a href="{{route('showDetailRoom',$room->room_type_id)}}">
                        <img src="{{ asset('public/image/')}}/{{$room->avatar}}" alt="">
                        <h4>{{$room->room_type_name}}</h4>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <!-- end container carousel -->
    </div>
</section>
<!-- end content  -->
@endsection

@section('css')
<style>
    .banner {
        background-image: url('{{asset('public/hotel/images/room-05.jpeg')}}');
        height: 400px;
    }
</style>
@endsection