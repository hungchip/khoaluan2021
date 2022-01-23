@extends('hotel.layouts.default')

@section('content')
<!-- banner  -->
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Liên hệ với chúng tôi</p>
    </div>
</section>
@if(Session::has('flash_message'))
<script>
    alert("{{Session::get('flash_message')}}");
</script>
@endif;
<!-- end banner  -->

<!-- content -->
<section class="content">
    <div class="container">
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6900443077316!2d105.92957561533198!3d21.005058293962083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a94c1f882977%3A0x6d016e6656923f46!2zSOG7jWMgdmnhu4duIE7DtG5nIG5naGnhu4dwIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1629642412190!5m2!1svi!2s"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="confirm">

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="confirm-form">
                        <form action="{{route('postContact')}}" method="post">
                            @csrf
                            <div class="confirm-list">
                                <label for="name">Tên <span>*</span></label>
                                <input type="text" id="name" placeholder="Tên của bạn" name="name">

                            </div>
                            <span class="error-message text-danger">{{$errors->first('name')}}</span></p>
                            <div class="confirm-list">
                                <label for="email">Email <span>*</span></label>
                                <input type="email" id="email" placeholder="Email của bạn" name="email">
                            </div>
                            <span class="error-message text-danger">{{$errors->first('email')}}</span></p>

                            <div class="confirm-list">
                                <label for="phone">Điện thoại <span>*</span></label>
                                <input type="number" id="phone" placeholder="Số điện thoại của bạn" name="phone">
                            </div>
                            <span class="error-message text-danger">{{$errors->first('phone')}}</span></p>

                            <div class="confirm-list">
                                <label for="message">Lời nhắn <span>*</span></label>
                                <textarea name="message" id="message" rows="3"></textarea>
                            </div>
                            <span class="error-message text-danger">{{$errors->first('message')}}</span></p>

                            <div class="confirm-list">
                                <label for="submit"></label>
                                <button type="submit">Gửi</button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="confirm-contact">
                        <div class="confirm-contact-list">
                            <i class="fas fa-envelope"></i>
                            <a href="">info@webhotel.vn</a>
                        </div>
                        <div class="confirm-contact-list">
                            <i class="fas fa-phone-alt"></i>
                            <a href="">0242 242 0777</a>
                        </div>
                        <div class="confirm-contact-list">
                            <i class="fas fa-location-arrow"></i>
                            <a href="">Tầng 4, số 147 Mai Dịch, Cầu Giấy, Hà Nội</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- end content  -->
@endsection
@section('css')
<style>
    .banner {
        background-image: url('{{asset('public/hotel/images/room-08.jpeg')}}');
        height: 400px;
    }

    .confirm-form form {
        text-align: center;
    }
</style>
@endsection