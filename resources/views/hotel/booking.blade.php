@extends('hotel.layouts.default')
@section('content')
<!-- banner  -->
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Đặt phòng</p>
    </div>
</section>

<!-- end banner  -->

<!-- content -->
<section class="content">
    <div class="container">
        @yield('form-booking')
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