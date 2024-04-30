(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            }
        }
    });
    
})(jQuery);

function filterRooms() {
    var start_date = document.getElementById('start_date').value;
    var end_date = document.getElementById('end_date').value;

    // Perform AJAX request to get filtered rooms
    $.ajax({
        url: '/filter-rooms',
        type: 'GET',
        data: {
            start_date: start_date,
            end_date: end_date
        },
        success: function(response) {
            console.log(response);
            document.getElementById('room_list').innerHTML = response;
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
    
}

$(function() {
   
    let today = new Date();

    let dd = today.getDate();
    let mm = today.getMonth() + 1;
    let yyyy = today.getFullYear();

  
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }

  
    today = yyyy + '-' + mm + '-' + dd;

    
    $('.check_in_date').attr('min', today);
    $('.check_out_date').attr('min', today);

   
    $('.check_in_date').on('change', function() {
       
        $('.check_out_date').attr('min', $(this).val());
       
        $('.check_out_date').val('');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const checkInDateInput = document.getElementById('check_in_date');
    const checkOutDateInput = document.getElementById('check_out_date');
    const totalPriceInput = document.getElementById('total_price');
    const pricePerNight = document.getElementById('room_price').value;

    checkInDateInput.addEventListener('change', updateTotalPrice);
    checkOutDateInput.addEventListener('change', updateTotalPrice);

    function updateTotalPrice() {
        const nights = Math.round((new Date(checkOutDateInput.value) - new Date(checkInDateInput.value)) / (1000 * 60 * 60 * 24));
        totalPriceInput.value = (pricePerNight * nights).toFixed(2);
    }
});






