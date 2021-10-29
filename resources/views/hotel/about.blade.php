@extends('hotel.layouts.default')
@section('content')
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Về chúng tôi</p>
    </div>
</section>
<!-- welcome  -->
<section id="welcome" class="welcome">
    <div class="container">
        <div class="welcome-text">
            <div class="welcome-text-title">
                Anh Em Hotel kính chào quý khách
            </div>
            <div class="welcome-text-content">
                <p>
                    Khách sạn Anh Em Hotel sở hữu vị trí đẹp và nổi bật. Nằm ngay bên bờ biển Bắc
                    Mỹ An, là khu nghỉ dưỡng sang trọng cùng dịch vụ phong phú mang đến kỳ
                    nghỉ thật thú vị.
                    Bờ biển miền Trung Việt Nam với dải cát dài trắng mịn cũng là điểm đến hấp dẫn cho những kỳ nghỉ gia
                    đình. Là một thành phố đang phát triển, cảnh quan thiên nhiên ưu ái với bờ biển đẹp, nhiều điểm tham
                    quan nổi tiếng, Đà Nẵng là điểm đến mới thú vị tại miền Trung Việt Nam.
                    Trang bị bởi cơ sở thiết bị hiện đại cho sự kiện và những dịch vụ riêng biệt của Pullman, Pullman Đà
                    Nẵng là trung tâm hội nghị lý tưởng tại Đà Nẵng. Khách sạn Pullman Đà Nẵng mang đến sự lựa chọn về
                    không gian hội nghị rộng lớn phù hợp với các sự kiện của doanh nghiệp hay không gian ngoài trời phù
                    hợp với tiệc cưới trên bãi biển hay tiệc tối bên bãi biển.


                </p>
                <p>Anh Em Hotel – là sự lựa chọn cho mọi kỳ nghỉ.</p>
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
                            Phòng khách sang trọng
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/breakfast.png')}}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Nhà hàng thanh lịch
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
                            Bể bơi vô cực
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/airplane.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Dịch vụ đưa đón sân bay
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/service.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Hỗ trợ 24/7
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/wifi.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Internet/wifi tốc độ cao
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 welcome-icon-item">
                        <div class="welcome-icon-img">
                            <img src="{{ asset('public/hotel/images/parking.png') }}" alt="">
                        </div>
                        <div class="welcome-icon-title">
                            Hầm gửi xe
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
@endsection
@section('css')
<style>
    .banner {
        background-image: url('{{asset('public/hotel/images/room-05.jpeg')}}');
        height: 400px;
    }
</style>
@endsection