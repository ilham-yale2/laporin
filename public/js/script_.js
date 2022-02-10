function redirect(URL) {
    window.location.href = URL
}

$("body").on('click', '.toggle-password', function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }

});

$("#left input").focus(function () {
    $("#right").attr('class', 'col-md-8 col-12 p-0 mr-0 bg-spring-green')
    $("#left").attr('class', 'col-md-4 col-12 p-0')
    $("#btn-masuk").addClass('w-100 my-4')
    $(".form-login-manual").removeClass('col-md-8').addClass('col-md-10')
    $(".form-login-manual form").css({
        'margin-top': '5.2rem'
    })
})

$("#right-qr").click(function () {
    $("#right-qr").removeClass('col-md-8').addClass('col-md-4')
    $("#left-qr").removeClass('col-md-4').addClass('col-md-8')
    $(".form-login-qr").removeClass('col-md-10').addClass('col-md-7')
    $(".login-qr-right").css({
        'padding-left': '2%',
        'padding-right': '2%'
    })
    $(".form-login-qr form").css({
        'margin-top': '6rem'
    })
    $(".login-qr-right div").addClass('px-3')
})

// navbar

$(document).ready(function () {
    AOS.init()

    function toggleNav() {
        $('#toggle-nav').toggleClass('nav-menus-show')
        $('#toggle-nav-closeable').toggleClass('overlay-show')
    }
    $('#toggle-nav-btn').click(function () {
        toggleNav()
    })
    $('#toggle-nav-closeable').click(function () {
        toggleNav()
    })
})

$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    if (wScroll > 10) {
        $("#navbar-primary").addClass('navbar-gradient px-5 py-3 shadow')
        $("#navbar-secondary").addClass('px-5 py-3 shadow')
    } else {
        $("#navbar-primary").removeClass('navbar-gradient px-5 py-3 shadow')
        $("#navbar-secondary").removeClass('px-5 py-3 shadow')
    }
})
// end navbar

// blog

$(".btn-dropdown").click(function () {
    $(".option-row").slideToggle()
    $(".fa-caret-left").toggleClass('toggle')

});

$(".option").click(function () {
    var dataOption = $(this).html();
    $("#category").val(dataOption)
})

$(".tags").click(function () {
    $(".tags").removeClass('active')
    $(this).addClass('active')
    $("#tags").val($(this).html())
})


// end blog