$('.js-hamburger').click(function () {
    $(this).toggleClass('js-open');
    $('.js-primary-menu').slideToggle();
});

$(document).mouseup(function (e) {
    const container = $('.header');
    const windowWidth = $(window).width();
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.js-hamburger').removeClass('js-open');
        if (windowWidth < 900) {
            $('.js-primary-menu').slideUp();
        }
    }
});

$(window).resize(function () {
    const windowWidth = $(window).width();
    if (windowWidth > 900) {
        $('.js-primary-menu').css('display', '');
        $('.js-hamburger').removeClass('js-open');
    }
});

$(document).ready(setFixedNavWidth);
$(window).on('resize', setFixedNavWidth);

function setFixedNavWidth() {
    if ($('.header.fixed')) {
        const screenWidth = $(window).width();
        const paddingLeft = parseInt($('.header.fixed').css('padding-left'));
        const paddingRight = parseInt($('.header.fixed').css('padding-right'));
        const paddingLR = paddingLeft + paddingRight;
        $('.header.fixed').css("width", screenWidth - paddingLR + 'px');
        $('.header.fixed').css("max-width", screenWidth - paddingLR + 'px');
    }
}

$(window).scroll(function () {
    const scroll = $(window).scrollTop();
    const headerHeight = $(".header").outerHeight();

    const screenWidth = $(window).width();
    const paddingLeft = parseInt($('.header.fixed').css('padding-left'));
    const paddingRight = parseInt($('.header.fixed').css('padding-right'));
    const paddingLR = paddingLeft + paddingRight;

    $('.header.fixed').css("width", screenWidth - paddingLR + 'px');
    $('.header.fixed').css("max-width", screenWidth - paddingLR + 'px');

    if (scroll > 0) {
        $(".header").addClass("fixed");
        $('body').css("margin-top", headerHeight + 'px');
    } else {
        $(".header").removeClass("fixed");
        $('body').css("margin-top", 'unset');
    }

    if (scroll == 0) {
        $(".header").removeClass("fixed");
        $('body').css("margin-top", 'unset');
    }

});
