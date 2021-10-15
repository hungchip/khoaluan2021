$(document).ready(function() {
    // scoll display menu bar
    $(window).scroll(function() {
        var pos = $('html, body').scrollTop();
        if (pos >= 100) {
            $('#header').css('background', '#000');
        } else {
            $('#header').css('background', 'none');
        }

    });
    // responsive menu bar button icon
    $(window).resize(function() {

        // Lấy thông số
        var width = $(window).width();

        if (width > 768) {
            // btn[0].style.display = "none";
            $('.menu-button').css('display', 'none');
            $('header').css('background', 'none');
        } else {
            // btn[0].style.display = "block";
            $('.menu-button').css('display', 'block');
            $('header').css('background', '#000');
        }
    });
    // slicky slider 
    $('.slick').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        prevArrow: false,
        nextArrow: false,
        autoplay: true,
    });

    ///slicky hotel 
    $('.slick-hotel').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        prevArrow: false,
        nextArrow: false,
        autoplay: false,
    });

    ///slicky view 
    $('.slick-review').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow: false,
        nextArrow: false,
        dots: false,
    });

    // $('.count').waypoint(function() {
    //     increment(1, 100);
    // }, { offset: '75%' });

    // function increment(elem, finalVal) {
    //     var currVal = parseInt(document.getElementById(elem).innerHTML, 10);
    //     if (currVal < finalVal) {
    //         currVal++;
    //         document.getElementById(elem).innerHTML = currVal;

    //         setTimeout(function() {
    //             increment(elem, finalVal);
    //         }, 40)
    //     }
    // };
    //content-image
    $('.content-image').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        prevArrow: false,
        nextArrow: false,
        autoplay: true,
    });

    //list image carousel
    // $(".list-image-carousel").flickity({
    //     pageDots: false,
    //     prevNextButtons: false,
    //     // groupCells: 2,
    //     autoPlay: true,
    // });

    $('.carousel-hook').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: false,
        nextArrow: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // date picker


    $('.t-datepicker').tDatePicker({
        autoClose: false,
        limitNextMonth: 2,
        iconDate: '<ion-icon name="calendar-outline"></ion-icon>',
        formatDate: 'yyyy-mm-dd',
    });
    // $('.t-datepicker').tDatePicker('show');

    // custome select option
    $('select').each(function() {
        var $this = $(this),
            numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function() {
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });
    });

    // date picker in booking page 

    $('.datepicker-2').tDatePicker({
        autoClose: false,
    });
    // $('.datepicker-2').tDatePicker('show');
});