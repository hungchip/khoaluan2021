@extends('hotel.layouts.default')
@section('content')
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">About</p>
    </div>
</section>
<!-- welcome  -->
<section id="welcome" class="welcome">
    <div class="container">
        <div class="welcome-text">
            <div class="welcome-text-title">
                Welcome
            </div>
            <div class="welcome-text-content">
                <p>
                    dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum egestas tellus et viverra.
                    Vestibulum euismod lacus eget nisi ornare, id laoreet tortor dapibus. Donec lacinia euismod diam,
                    convallis tempus risus. Ut et felis tempor eros blandit feugiat
                    ut non enim. In vestibulum ligula blandit magna blandit dictum. Aenean ultricies enim nec lorem
                    vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum
                    egestas tellus et viverra. Vestibulum euismod
                    lacus eget nisi ornare, id laoreet tortor dapibus. Donec lacinia euismod diam, convallis tempus
                    risus. Ut et felis tempor eros blandit feugiat ut non enim. In vestibulum ligula blandit magna
                    blandit dictum. Aenean ultricies enim nec
                    lorem vestibulum, nec
                </p>
            </div>
        </div>
        <div class="welcome-icon">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{asset('public/hotel/images/beg.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            LUXURY GUEST ROOM
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{asset('public/hotel/images/breakfast.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Elegant restaurant
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{asset('public/hotel/images/key.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Free lockers
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{asset('public/hotel/images/pool.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Infinity swimming pool
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{asset('public/hotel/images/airplane.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Airport drop off service
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{asset('public/hotel/images/service.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            24 hours support
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{asset('public/hotel/images/wifi.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Height speed internet/wifi
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{asset('public/hotel/images/parking.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Car parking
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="welcome-gallery">
            <div class="row">

                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 welcome-gallery-img">
                    <a href=""><img src="{{asset('public/hotel/images/gallery-01.jpeg')}}" alt=""></a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 welcome-gallery-img">
                    <a href=""><img src="{{asset('public/hotel/images/gallery-02.jpeg')}}" alt=""></a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 welcome-gallery-img">
                    <a href=""><img src="{{asset('public/hotel/images/gallery-03.jpeg')}}" alt=""></a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- end welcome  -->
@endsection
@section('css')
<style>
    .banner {
        background-image: url('{{asset('public/hotel/images/room-05.jpeg')}}');
        height: 400px;
    }
</style>
@endsection