function redirect(URL) {
    window.location.href = URL
}

function resetData() {
    $('.form-control').val('')

}
$('#sign-up-btn').on('click', function () {
    $('.container').addClass('sign-up-mode')
})
$('#sign-in-btn').on('click', function () {
    $('.container').removeClass('sign-up-mode')
})

$("#password-toggle").on('click', function () {
    $('fas', this).toggleClass('fa-eye fa-eye-slash')
    var input = $("#password")
    input.attr('type') == 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
})

$("#password-toggle2").on('click', function () {
    $('fas', this).toggleClass('fa-eye fa-eye-slash')
    var input = $("#password2")
    input.attr('type') == 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
})


$('.kategori-pengaduan').on('click', function () {
    $('.kategori-aspirasi').hide();
    $('.cancel-type').show();
})
$('.kategori-aspirasi').on('click', function () {
    $('.kategori-pengaduan').hide();
    $('.cancel-type').show();
})
$('.cancel-type').hide();
$('.cancel-type').on('click', function () {
    $('.kategori-aspirasi').show();
    $('.kategori-pengaduan').show();
    $('.cancel-type').hide();
    resetData();
})


$(window).scroll(function () {
    scrollTop = $(this).scrollTop();

    if (scrollTop > 20) {
        $('#myNavbar').removeClass('navbar-dark').addClass('bg-light navbar-light px-5 py-2 Mshadow')
        $('#myNavbar .navbar-brand').removeClass('text-white').addClass('text-dark')
    } else {
        $('#myNavbar').removeClass('bg-light navbar-light px-5 py-2 Mshadow').addClass('navbar-dark')
        $('#myNavbar .navbar-brand').addClass('text-white').removeClass('text-dark')
    }


})

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active')
    $(this).addClass('active')
})

$(".kategori").on('click', function () {
    $('.kategori input').attr('checked', false)
    $('.kategori').removeClass('bg-darkGreen text-light')
    $('input', this).attr('checked', true)
    $(this).addClass('bg-darkGreen text-light')
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
    }
});


function next() {

    var formData = $('#register').serialize();
    $.ajax({
        url: "/next",
        method: 'POST',
        data: formData,
        success: function (res) {
            $('#first').addClass('d-none')
            $('#first-1').addClass('d-none')
            $('#first-2').addClass('d-none')
            $('#first-3').addClass('d-none')
            $('#second').removeClass('d-none')
            $('#second-1').removeClass('d-none')
            $('#second-2').removeClass('d-none')
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('.' + key).val('')
                    $('.' + key)
                        .attr('placeholder', value)

                })
            }
        }
    })

}

function registrasi() {
    var formData = $('#register').serialize();

    $.ajax({
        url: "/registrasi",
        method: 'POST',
        data: formData,
        success: function (res) {
            Swal.fire('Registrasi', res.text, 'success');
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('.' + key).val('')
                    $('.' + key)
                        .attr('placeholder', value)

                })
            }
        }
    })

}


function login() {
    var formData = $('#login')[0];
    var data = new FormData(formData);

    $.ajax({
        url: "/login",
        method: 'POST',
        data: data,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            Swal.fire(res.title, res.message, res.type)
            if (res.type == 'success') {
                redirect('/user')
            }
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('.' + key + '-login').val('')
                    $('.' + key + '-login')
                        .attr('placeholder', value)

                })
            }
        }

    })
}

$('#logout').on('click', function () {
    $.ajax({
        url: $(this).data('url'),
        method: 'POST',
        data: $(this, 'input'),
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            if (res == 'success') {
                redirect('/login')
            }
        }
    })
})


$('.input field')
