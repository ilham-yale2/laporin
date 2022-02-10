function readURL(input, target) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            target.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function timeout() {
    setTimeout(function () {
        $('#link').data('url', null).addClass('d-none')
        timeout();
    }, 10);
}
timeout()

var d = new Date;
var date = d.getDate()
if (date < 10) {
    date = '0' + date
}
var month = d.getMonth() + 1;
if (month < 10) {
    month = '0' + month
}
var dateNow = date + '/' + month + '/' + d.getFullYear()
$('#dateNow').html(dateNow)

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
    }
});

function loadData() {
    $.get('Mlaporan', function (data) {
        $('#dataStudents').html(data);
    })
}

function listLaporan(res) {
    $('#links').html('')
    if (res.data != '') {
        if (res.status == 'ditanggapi') {
            var bg = 'successs'
        } else {
            var bg = 'warning'
        }
        $.each(res.links, function (a, link) {
            if (link.active == true) {
                var active = 'bg-darkGreen'
            } else {
                var active = false
            }
            $('#links').append(`
                <li style="list-style:none" class="d-inline-block">
                     <button  class="btn ` + active + `" id="link" data-url="` + link.url + `"> ` + link.label + `</button>
                </li>
            `)


        })
        $.each(res.data, function (e, data) {
            if (data.status == 'proses') {
                var bg = 'success',
                    status = 'waiting'

            } else if (data.status == 0) {
                var bg = 'warning',
                    status = 'verify'

            } else if (data.status == "selesai") {
                var bg = 'primary',
                    status = 'clear',
                    modal = 'data-toggle="modal" data-target="#modalShowTanggapan"',
                    clear = `onclick="showTanggapan(` + data.id_pengaduan + `)`

            } else {
                var bg = '',
                    modal = '',
                    clear = ''

            }
            $('#myLaporan').append(`
            
            <div class="col-md-3 col-6 pl-0 mt-3">
                <div class="card px-0">
                    <div class="card-img">
                        <img class="card-img-top "  src="` + $('.modal').data('lampiran') + '/' + data.lampiran + `" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title title">` + data.judul + `</h5>
                        <p class="card-text text-muted text">` + data.tanggal + `</p>
                        <div class="mr-2 text-light title btn bg-` + bg + `" ` + modal + clear + ` "> ` + status + `</div>
                        <button id="detailLaporan" class="btn btn-primary d-inline-block" data-id="` + data.id_pengaduan + `" data-toggle="modal" data-target="#modalLaporan"><i class="fas fa-eye"></i></button>
                    </div>
                </div>
            </div>
            `)
            $('[data-toggle="tooltip"]').tooltip()
            $('#loader').addClass('d-none')
        })
    } else {
        $('#loader').addClass('d-none')
        $('#myLaporan').append(`
            <p class="text-center">Anda Belum Memiliki Laporan</p>
        `)
    }
}

function getMyLaporan(nik) {
    $('#myLaporan').html('');
    var url = $('.baseURL').data('url') + '/user/lapor/' + nik
    $.ajax({
        url: url,
        method: 'PUT',
        data: nik,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            $('#link').removeClass('d-none')
            listLaporan(res)
            $('#link').data('url', null).addClass('d-none')
        }

    })

}

$('#links').on('click', '#link', function () {
    $('#links #link').removeClass('bg-darkGreen')
    $(this).addClass('bg-darkGreen')
    var link = $(this).data('url')
    $('#myLaporan').html('');
    $('#links').html(' ')
    $.ajax({
        url: link,
        method: 'PUT',
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            $('#link').removeClass('d-none')
            listLaporan(res)
        }

    })
})

$("#lampiran").change(function () {
    $('#result-img').html(`
                        <div class="col-6 pt-3">
                            <img class="radius-10 w-100" src="" alt="" id="img-lampiran">
                        </div>
                        `)
    readURL(this, $('#btn-lampiran img'))

})

function createLaporan() {
    var btn = $('#btnLapor').html();
    $('#btnLapor').attr('disabled', true);
    if ($('#result-img img').attr('src') == '') {
        Swal.fire('Oops!', 'Mohon tambahkan lampiran', 'warning')
        $('#btnLapor').attr('disabled', false);


    }

    $('span').remove('.invalid-feedback');
    $('input , select').removeClass('is-invalid');
    var form = $('form')[0];
    var formData = new FormData(form);
    var url = $('.baseURL').data('url') + '/user/lapor'
    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            Swal.fire(res.title, res.message, res.type)
            $('#btnLapor').attr('disabled', false)
            if (res.type == 'success') {
                $('#btn-cancel').click()
            }
        },
        error: function (xhr) {
            $('#btnLapor').attr('disabled', false);
            Swal.fire('Oops!', 'Lengkapi Form', 'warning')
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-control')
                        .addClass('is-invalid')
                        .after(' <span class="invalid-feedback"><strong>' + value + '</strong> </span> ')
                })

                if (res.errors.lampiran != '') {
                    var message = res.lampiran[0] + " " + res.lampiran[1] + " " + res.lampiran[2]
                    Swal.fire('Oops!', message, 'warning')
                }
            }

        }
    })
}


$("#btn-lampiran").on('click', function () {
    $("#lampiran").click()
})

$('#myLaporan').on('click', '#detailLaporan', function () {
    $('#loader').removeClass('d-none')
    $('.modal').data('user')
    var url = $('.baseURL').data('url') + '/user/lapor/' + $('.modal').data('user') + '/' + $(this).data('id')

    $('#modalBodyDetail').html('')
    $.ajax({
        url: url,
        method: 'GET',
        success: function (res) {
            var data = res[0]
            if (data.status == 0) {
                data.status = 'verifikasi'
            }
            $('#modalBodyDetail').html(`
                <div class="container-fluid px-3">
                    <h4 class="title text-darkGreen mb-4">` + data.status + `</h4>
                    
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="judul" class="title">Judul</label>
                            <input type="text" class="form-control" value="` + data.judul + `">
                        </div>
                        <div class="form-group col-6">
                            <label for="tanggal" class="title"Tanggal>Tanggal</label>
                            <input type="text" class="form-control" value="` + data.tanggal + `">
                        </div>
                        <div class="form-group col-6">
                            <label for="wilayah" class="title">Wilayah</label>
                            <input type="text" class="form-control" value="` + data.wilayah + `">
                        </div>
                        <div class="form-group col-6">
                            <label for="kategori" class="title">Kategori</label>
                            <input type="text" class="form-control" value="` + data.kategori + `">
                        </div>
                        <div class="form-group col-8">
                            <label for="isi" class="title">Isi</label>
                            <textarea class="form-control detailIsi" value="" cols="30" rows="10">` + data.isi + `</textarea>
                        </div>
                        <div class="col-4">
                            <label for="isi" class="title">Lampiran</label>
                            <img class="radius-10 w-100" src="` + $('.modal').data('lampiran') + '/' + data.lampiran + `" >
                        </div>
                    </div>
                </div>
            `)
            $('.modal-body input ,.detailIsi').attr('disabled', 'disabled')
            $('#loader').addClass('d-none')

        }

    })


})


function getMyProfile(id) {
    $.ajax({
        url: 'profile/' + id,
        method: "GET",
        success: function (res) {
            let data = res.mProfile
            $('.email').html(data.email)
            $('#email').val(data.email)
            $('#name').val(data.name)
            $('#alamat').val(data.alamat)
            $('#number').val(data.number)
            $('#oldAvatar').val(data.avatar)
            $("#gender option[value = '" + data.gender + "']").attr("selected", "selected")
        }
    })
}



function changePhoto() {
    $('#avatar').click()
}


$("#avatar").change(function () {
    readURL(this, $('#AvatarPreview'))
})


$("body").on('click', '.toggle-password', function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }

})

function saveProfile() {
    $('#loader').removeClass('d-none')
    $('span').remove('.invalid-feedback');
    $('input , select').removeClass('is-invalid');
    var form = $('form')[0];
    var formData = new FormData(form);
    $.ajax({
        url: "profile/",
        method: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data.avatar != "") {
                $('#avatarImg').attr(data.avatar)
                $('#oldAvatar').val(data.avatar)
            }
            $('#loader').addClass('d-none')
            Swal.fire('Your profile', data.message, data.type)

        },
        error: function (xhr) {
            $('#loader').addClass('d-none')
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-control')
                        .addClass('is-invalid')
                        .after(' <span class="invalid-feedback"><strong>' + value + '</strong> </span> ')
                    if (res.errors.avatar != null) {
                        Swal.fire('Oops!', "" + res.errors.avatar + "", 'warning')
                    }
                })


            }
        }
    })


}

function showTanggapan(id) {
    $.ajax({
        url: $('.baseURL').data('url') + '/user/tanggapan',
        type: 'PUT',
        data: {
            id_pengaduan: id
        },
        success: function (res) {
            $('#tanggapanIsi').text(res)
        }
    })
}
