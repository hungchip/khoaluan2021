@extends('hotel.layouts.default')
@section('content')
<!-- banner  -->
<section id="banner" class="banner">
    <!-- <div class="carousel1" data-flickity='{"wrapAround": true}'>
                            <div class="carousel-cell"><img src="assets/images/banner1.jpg" alt=""></div>
                            <div class="carousel-cell"><img src="assets/images/banner2.jpg" alt=""></div>
                            <div class="carousel-cell"><img src="assets/images/banner3.jpg" alt=""></div>
                            <div class="carousel-cell"><img src="assets/images/banner4.jpg" alt=""></div>
                        </div> -->
    <div class="intro text-center">
        <p class="intro-top">Best place for</p>
        <p class="intro-mid">Spend your holiday</p>
        <p class="intro-bot">Responsive and Elegant Design</p>
        <div class="stage">
            <div class="icon-down box bounce-1"><a href="#welcome"><i class="fas fa-angle-down"></i></a></div>
        </div>

    </div>
</section>

<!-- end banner  -->
<div class="check-room">
    <div class="container">
        <form action="">
            <div class="t-datepicker">
                <div class="t-check-in t-picker-only">
                    <div class="t-dates t-date-check-in ">
                        <label class="t-date-info-title">Check In</label>
                    </div>
                    <input type="hidden" class="t-input-check-in" value="null" name="start">
                    <div class="t-datepicker-day">
                        <table class="t-table-condensed">
                            <!-- Date theme calendar -->
                        </table>
                    </div>
                </div>
                <div class="t-check-out t-picker-only">
                    <div class="t-dates t-date-check-out">
                        <label class="t-date-info-title">Check Out</label>
                    </div>
                    <input type="hidden" class="t-input-check-out" value="null" name="end">
                </div>
                <div class="select-adult">
                    <label for="adult"></label>
                    <!-- <input type="text" id="adult" name="adult" placeholder="adult"> -->
                    <select id="adult" name="adult" placeholder="">
                        <option value="hide" disabled selected>-- Adult --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="select-child">
                    <label for="child"></label>
                    <!-- <input type="text" id="child" name="child" placeholder="child"> -->
                    <select id="child" name="child">
                        <option value="hide" disabled selected>-- Child --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <div class="submit-button">
                <button>Check</button>
            </div>
        </form>
    </div>
</div>

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
                    vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum egestas
                    tellus et viverra. Vestibulum
                    euismod lacus eget nisi ornare, id laoreet tortor dapibus. Donec lacinia euismod diam, convallis
                    tempus risus. Ut et felis tempor eros blandit feugiat ut non enim. In vestibulum ligula blandit
                    magna blandit dictum. Aenean ultricies
                    enim nec lorem vestibulum, nec
                </p>
            </div>
        </div>
        <div class="welcome-icon">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/beg.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            LUXURY GUEST ROOM
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/breakfast.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Elegant restaurant
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/key.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Free lockers
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/pool.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Infinity swimming pool
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/airplane.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Airport drop off service
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/service.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            24 hours support
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/wifi.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Height speed internet/wifi
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/parking.png') }}" alt="">
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
                    <a href=""><img src="{{ asset('public/hotel/images/gallery-01.jpeg') }}" alt=""></a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 welcome-gallery-img">
                    <a href=""><img src="{{ asset('public/hotel/images/gallery-02.jpeg') }}" alt=""></a>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 welcome-gallery-img">
                    <a href=""><img src="{{ asset('public/hotel/images/gallery-03.jpeg') }}" alt=""></a>
                </div>


            </div>
        </div>
    </div>
</section>

<!-- end welcome  -->

<!-- special  -->
<section id="special" class="special">
    <div class="container-fluid">
        <div class="special-title">
            Special Room
        </div>
        <div class="slick  ">
            @foreach ($specialRooms as $room)
            <div class="special-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-right">
                        <div class="special-content-title">{{$room->room_type_name}}</div>
                        <div class="special-content-content">
                            <p>
                                {{$room->quote}}
                            </p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <a href=""><img src="{{ asset('public/image/') }}/{{$room->avatar}}" alt=""></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- end special  -->
<!-- room  -->
<section id="room" class="room">
    <div class="room-title">
        All rooms
    </div>
    <div class="room-img">
        <div class="container">
            <div class="row">
                @foreach($roomTypes as $room)
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 room-img">
                    <a href=""><img src="{{ asset('public/image/') }}/{{$room->avatar}}" alt=""></a>
                    <a href="">
                        <div class="room-img-text">
                            <p>{{$room->room_type_name}}</p>
                            {{-- <p>Moun view</p> --}}
                            {{-- <p>2 bed / AC / Balcony</p> --}}
                            <p>Per Night {{number_format($room->room_type_price)}} VND</p>
                        </div>
                        <div class="room-img-background"></div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="room-view">
        <a href="{{route('showPageRoom')}}">View All</a>
    </div>
</section>

<!-- end room  -->
<!-- counter  -->
<section id="counter" class="counter">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-inner">
                    <span id="count-room" class="count">0</span>
                    <p class="">Rooms</p>
                </div>
            </div>
            <div class="
                            col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-inner">
                    <span class="count">100</span>
                    <p class="">Stuff</p>
                </div>
            </div>
            <div class="
                                col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-inner">
                    <span class="count">900</span>
                    <p class="">Happy Clients</p>
                </div>
            </div>
            <div class="
                                    col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-inner">
                    <span class="count">300</span>
                    <p class="">Awards Received</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end couter  -->
<!-- video  -->
<section class="video">
    <iframe src="https://www.youtube.com/embed/HAT_iwMTWbs" title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
</section>

<!-- end video  -->

<!-- hotel  -->
<section class="hotel">
    <div class="special-title">
        Insde our hotel
    </div>
    <div class="slick-hotel">
        <div class="hotel-content">
            <div class="hotel-img">
                <img src="{{ asset('public/hotel/images/hotel-02.jpeg') }}" alt="">
            </div>
            <div class="hotel-text">
                <div class="hotel-text-tittle">Restaurant</div>
                <p>
                    02 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum egestas tellus
                    et viverra. Vestibulum euismod lacus eget nisi ornare 02.
                </p>
            </div>
        </div>
        <div class="hotel-content">
            <div class="hotel-img">
                <img src="{{ asset('public/hotel/images/hotel-02.jpeg') }}" alt="">
            </div>
            <div class="hotel-text">
                <div class="hotel-text-tittle">Ultimate Swimming Pool</div>
                <p>
                    02 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum egestas tellus
                    et viverra. Vestibulum euismod lacus eget nisi ornare 02.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- end hotel  -->

<!-- review  -->
<section class="review">
    <div class="review-title">Review</div>
    <div class="slick-review">
        <div class="review-content">
            <div class="review-content-img">
                <img src="{{ asset('public/hotel/images/view-01.jpeg') }}" alt="">
            </div>
            <div class="review-content-desc">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum egestas tellus et
                    viverra. Vestibulum euismod lacus eget nisi ornare, id laoreet tortor dapibus.
                </p>
            </div>
            <div class="review-content-job">
                <p>Robin</p>
                <p>CEO, Info Net</p>
            </div>
        </div>

        <div class="review-content">
            <div class="review-content-img">
                <img src="{{ asset('public/hotel/images/view-02.jpeg') }}" alt="">
            </div>
            <div class="review-content-desc">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum egestas tellus et
                    viverra. Vestibulum euismod lacus eget nisi ornare, id laoreet tortor dapibus.
                </p>
            </div>
            <div class="review-content-job">
                <p>Robin</p>
                <p>CEO, Info Net</p>
            </div>
        </div>
        <div class="review-content">
            <div class="review-content-img">
                <img src="{{ asset('public/hotel/images/view-03.jpeg') }}" alt="">
            </div>
            <div class="review-content-desc">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum egestas tellus et
                    viverra. Vestibulum euismod lacus eget nisi ornare, id laoreet tortor dapibus.
                </p>
            </div>
            <div class="review-content-job">
                <p>Robin</p>
                <p>CEO, Info Net</p>
            </div>
        </div>

    </div>
</section>
<!-- end review -->

<!-- logo  -->

<section class="logo">
    <div class="slick-logo">

    </div>
</section>

<!-- end logo -->
</main>

@endsection

@section('css')
<style>
    .banner {
        position: relative;
        background-image: url('{{asset('public/hotel/images/banner.jpeg')}}');
        background-size: cover;
        height: 700px;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;


    }

    /* .banner::after {
        top: 0;
        left: 0;
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        background: #000;
        opacity: 0.5;
    } */
</style>
@endsection

@section('js')

<script>
    


$(document).ready(function() {
    function increment(elem, finalVal) {
    var currVal = parseInt(document.getElementById(elem).innerHTML, 10);
    if (currVal < finalVal) {
        currVal++;
        document.getElementById(elem).innerHTML = currVal + "%";
        setTimeout(function() {
            increment(elem, finalVal);
        }, 40)
    }
};

$('#count-room').waypoint(function() {
        increment('#count-room', 87);
    }, {offset: '75%'});
});
</script>
@endsection