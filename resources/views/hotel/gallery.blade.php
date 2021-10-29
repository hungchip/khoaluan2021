@extends('hotel.layouts.default')

@section('content')
<!-- banner  -->
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Bộ sưu tập</p>
    </div>
</section>

<!-- end banner  -->

<!-- content -->
<section class="content">
    <div class="container">

        <div class="row">
            @foreach ($gallerys as $gallery)
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 gallery-item">
                <img src="{{asset('public/image/gallery/')}}/{{$gallery->image}}" alt="{{$gallery->image}}">
            </div>
            @endforeach

        </div>

    </div>
</section>
<!-- end content  -->
@endsection

@section('css')
<style>
    .banner {
        background-image: url('{{asset('public/hotel/images/room-06.jpeg')}}');
        height: 400px;
    }
</style>
@endsection