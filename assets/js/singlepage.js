
if ($('.js-apply').length) {
    $('.js-apply').click(function () {
        $('html, body').animate({
            scrollTop: $(".js-contact-form").offset().top - 48
        }, 300);
    });
}