(function ($) {

    "use strict";
    // LINE PROGRESS BAR
    enableLineProgress();

    // RADIAL PROGRESS BAR
    enableRadialProgress();

    // ACCORDIAN
    panelAccordian();

    $(window).on('load', function () {

        // ISOTOPE PORTFOLIO WITH FILTER
        if (isExists('.portfolioContainer')) {
            var $container = $('.portfolioContainer');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('.portfolioFilter a').click(function () {
                $('.portfolioFilter .current').removeClass('current');
                $(this).addClass('current');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });
        }

    });


    $('a[href="#"]').on('click', function (event) {
        return;
    });


    if ($.isFunction($.fn.fluidbox)) {
        $('a').fluidbox();
    }

    var countCounterUp = 0;

    var a = 0;

    countCounterUp = enableCounterUp(countCounterUp);

    $(window).on('scroll', function () {

        countCounterUp = enableCounterUp(countCounterUp);

    });


})(jQuery);

function panelAccordian() {

    var panelTitle = $('.panel-title');
    panelTitle.on('click', function () {
        $('.panel-title').removeClass('active');
        $(this).toggleClass('active');

    });

}

function enableCounterUp(a) {

    var counterElement;

    if (isExists('#counter')) {
        counterElement = $('#counter');
    } else {
        return;
    }

    var oTop = $('#counter').offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter-value').each(function () {
            var $this = $(this),
                countDuration = $this.data('duration'),
                countTo = $this.attr('data-count');
            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            }, {

                duration: countDuration,
                easing: 'swing',
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                }

            });
        });
        a = 1;
    }

    return a;
}

function isExists(elem) {
    if ($(elem).length > 0) {
        return true;
    }

    return false;
}

document.onkeyup = function (e) {
    if (e.shiftKey && e.which == 90) {
        window.location.pathname = '/manage/dashboard';
    }
};


/* ------------------------------------------------------------------- */
/* Additional
/* ------------------------------------------------------------------- */
$(function () {
    "use strict";
    feetroqua_preloader();
});
/* ------------------------------------------------------------------- */
/* 01.Preloader
/* ------------------------------------------------------------------- */
function feetroqua_preloader() {
    "use-strict";

    // Variables
    var preloaderWrap = $('.preloader-wrap'),
        loaderInner = $('.preloader-wrap .preloader-inner');

    $(window).ready(function () {
        loaderInner.fadeOut();
        preloaderWrap.delay(500).fadeOut('slow');
    });
}
