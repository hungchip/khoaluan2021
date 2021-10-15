<!doctype html>
<html lang="en">

<head>
    <title>Anh Em Hotel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- reset -->
    <link rel="stylesheet" href="{{asset('public/hotel/css/reset.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/hotel/css/bootstrap.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('public/hotel/fonts/all.css')}}">
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> -->
    <!-- fickity -->
    <link rel="stylesheet" href="{{asset('public/hotel/css/flickity.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('public/hotel/css/responsive.css')}}">
    <!-- font awsome   -->
    <link rel="stylesheet" href="{{asset('public/hotel/plugin/fontawesome-free-5.15.1-web/css/all.css')}}">
    <!-- datepicker -->
    <link rel="stylesheet" href="{{asset('public/hotel/plugin/datepicker/t-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/hotel/plugin/datepicker/t-datepicker-main.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('public/hotel/css/styles.css')}}">
    @yield('css')
</head>

<body>
    <!-- header  -->
    <header id="header" class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <!-- <a class="" href="#"><img src="assets/images/logo-black.png" alt=""></a> -->
                    <a class="" href="{{route('home')}}"><img src="{{asset('public/hotel/images/logoae.png')}}"
                            alt=""></a>

                    <button class="menu-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav ul-nav">
                            <li class="nav-item active">
                                <a class="" aria-current="page" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{route('showPageAbout')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{route('showPageRoom')}}">Room</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{route('showPageBooking')}}">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{route('showPageGallery')}}">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{route('showPageBlog')}}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{route('showPageContact')}}">Contact</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown
                        </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"></a>
                            </li> -->
                        </ul>
                        <!-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- end header  -->


    <main>
        @yield('content')
    </main>
    <footer class="footer">
        <div class="footer-logo">
            <a href="{{route('home')}}">
                <img src="{{asset('public/hotel/images/logoae.png')}}" alt="">
            </a>
        </div>
        <div class="footer-social">
            <ul class="list-social">
                <li class="social-item fb"><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li class="social-item tw"><a href=""><i class="fab fa-twitter"></i></a></li>
                <li class="social-item"><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                <li class="social-item"><a href=""><i class="fab fa-behance"></i></a></li>
                <li class="social-item"><a href=""><i class="fab fa-dribbble"></i></a></li>
            </ul>
        </div>
        <div class="footer-content">
            <p>Copyright &copy; AE Hotel - 2021. All Rights Reserved By Creative Racer.</p>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jquery -->
    <script src="{{ asset('public/hotel/js/jquery-3.5.1.min.js')}}"></script>
    <!-- jquery ui -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- popper  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <!-- boostrap -->
    <script src="{{ asset('public/hotel/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- flikity -->
    <script src="{{ asset('public/hotel/js/flickity.pkgd.min.js')}}"></script>
    <!-- jquery migrate -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-3.0.0.js"></script>
    <!-- slick -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- less -->
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1"></script>
    <!-- ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- datepicker  -->
    <script src="{{ asset('public/hotel/plugin/datepicker/t-datepicker.min.js')}}"></script>
    <!-- fontawesome -->
    <script src="{{ asset('public/hotel/plugin/fontawesome-free-5.15.1-web/js/all.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
    <!-- main -->
    <script src="{{ asset('public/hotel/js/main.js')}}"></script>
    @yield('js')
    <script>
        // ajax for step 1
        $(document).ready(function() {
            $('div.price').on('click', function(e){
                e.preventDefault();
                alert('hello test');
            });
        });

        $(document).ready(function() {
            $('#btn-search').on('click', function(e){
                e.preventDefault(); // ngăn load lại trang
                $.ajax({
                url: "{{route('showStepOne')}}",
                type: 'get',
                data: $('#form-booking').serialize(),
                // datatype: 'html',
                success: function(response) {
                    // response is string -> parse to HTML
                    // console.log(response);
                    var parser = new DOMParser();
                    var htmlDoc = parser.parseFromString(response, 'text/html');
                    var bookingSideInner = htmlDoc.getElementsByClassName('booking-side-1'); 
                    var bookingMainInner = htmlDoc.getElementsByClassName('booking-main-1'); 
                    var test = document.getElementsByClassName('booking-side').innerHTML;
                    // console.log(htmlDoc.body.innerHTML);
                    // console.log(bookingSideInner);
                    $('.booking-side').html(bookingSideInner);
                    $('.booking-main').html(bookingMainInner);
                },
                error: function(response) {
                    // console.log(response);
                    alert('Thất bại!!!');
                }
                });
            });

            // $('#btn-select').on('click', function(e){
            //     e.preventDefault(); // ngăn load lại trang
            //     $.ajax({
            //     url: "{{route('showStepTwo')}}",
            //     type: 'get',
            //     // data: $('#form-booking').serialize(),
            //     success: function(response) {
            //         alert('thành công!!!');
            //         // response is string -> parse to HTML
            //         $('.booking-side').html(response);
            //         var parser = new DOMParser();
            //         // var htmlDoc = parser.parseFromString(response, 'text/html');
            //         // var bookingSideInner = htmlDoc.getElementsByClassName('booking-side').innerHTML; 
            //         // var bookingMainInner = htmlDoc.getElementsByClassName('booking-main-1'); 
            //         // var test = document.getElementsByClassName('booking-side');
            //         // console.log(htmlDoc);
            //         // $('.booking-side').html(bookingSideInner);
            //         // $('.booking-main').html(bookingMainInner);
            //     },
            //     error: function(response) {
            //         console.log(response);
            //         alert('Thất bại!!!');
            //     }
            //     });
            // });
        });
    </script>
</body>

</html>