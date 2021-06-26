$(document).ready(function () {
    bsCustomFileInput.init()
})

$('.slider').slick({
    infinite: false,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 5,
    responsive: [{
        breakpoint: 992,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true
        }
    }, {
        breakpoint: 576,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: true
        }
    }]
});

$('.category-slider').slick({
    infinite: false,
    arrows: false,
    slidesToShow: 6,
    slidesToScroll: 6,
    responsive: [{
        breakpoint: 992,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true
        }
    }, {
        breakpoint: 576,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: true
        }
    }]
});

$('.product-card .card').hover(function () {
    $(this).addClass('shadow');
}, function () {
    $(this).removeClass('shadow');
});

$('#accordionNav').click(function () {
    $('#sidebar').toggleClass('d-none');
});

function reponsiveAccordion() {
    if (innerWidth < 992) {
        $('#sidebar').addClass('d-none');
    } else {
        $('#sidebar').removeClass('d-none');
    }
}

reponsiveAccordion();
onresize = function () {
    reponsiveAccordion();
}

$('#sidebar .accordion').click(function () {
    let heading = $(this).children()[0];
    let arrow = $(heading).children()[1];
    let option = $(this).children()[1];

    $(option).on('show.bs.collapse', function () {
        $(arrow).addClass('rotate-down');
        $(arrow).removeClass('rotate-0');
    });
    $(option).on('hide.bs.collapse', function () {
        $(arrow).addClass('rotate-0');
        $(arrow).removeClass('rotate-down');
    });
});

$(function () {
    $('[data-toggle="popover"]').popover()
})

let activeAccordion = $('.accordion-active').parent().parent().children()[0];
if (activeAccordion != undefined && $(activeAccordion).is('button')) {
    activeAccordion.click();
}
