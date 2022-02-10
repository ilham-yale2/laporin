function readURL(input, target) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            target.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function changePhoto() {
    $('#avatarField').click()
}


$("body").on('click', '.toggle-password', function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }

})

$("#avatarField").change(function () {
    readURL(this, $('#ProfilePreview'))
})


$.ajaxSetup({
    headers: {
        'CSRFToken': $('input[name=_token').val()
    }
});

var url = $('.baseUrl').data('url')
var level = $('.admin').data('level')
var page = $('.page').data('title')
var table = $('#example').DataTable({
    "ajax": {
        url: url + '/admin/pengaduan',
        method: "PUT",
        data: {
            level: level,

        }
    },
    "columns": [{
        "data": "judul"
    }, {
        "data": "judul"
    }, {
        "data": "nik"
    }, {
        "data": "kategori"
    }, {
        "data": "tanggal"
    }, {
        "data": "kategori"
    }],
    "columnDefs": [{
            "targets": -1,
            "data": null,
            "render": function (id, index, data, type, row) {
                var id = data.id_pengaduan;
                var btn = '';
                var id_ = $('.admin').data('id')
                btn += '<button type="button" onclick="ShowPengaduan(' + id + ')" class="btn-primary btn btn-outline p-action">';
                btn += '<i class="fas fa-eye"></i>';
                btn += '</button>';
                if (page == 'pengaduan') {
                    if (level == 'petugas' || level == 'admin') {
                        if (data.status == '0') {
                            btn += ' | ';
                            btn += '<button type="button" onclick="verify(' + id + ')" class="btn-warning btn text-white btn-outlline p-action">';
                            btn += '<i class="fas fa-check"></i>';
                            btn += '</button>';
                            btn += ' | ';
                            btn += '<button type="button" onclick="rejectPengaduan(' + id + ')" class="btn-dark btn text-white btn-outlline p-action">';
                            btn += '<i class="fas fa-close"></i>';
                            btn += '</button>';
                        } else if (data.status == 'proses') {
                            btn += ' | ';
                            btn += '<button type="button" onclick="tanggapi(' + id + ',' + id_ + ')" class="btn-success btn btn-outlline p-action" >';
                            btn += '<i class="fas fa-comment"></i>';
                            btn += '</button>';
                        } else if (data.status == 'selesai') {
                            btn += ' | ';
                            btn += '<button type="button" onclick="showTanggapan(' + id + ')" class="btn-info btn btn-outlline p-action" data-toggle="modal" data-target="#modalShowTanggapan">';
                            btn += '<i class="fas fa-comment"></i>';
                            btn += '</button>';
                            if (level == 'admin') {
                                btn += ' | ';
                                btn += '<a href="' + url + '/admin/print/' + id + '" target="_blank">';
                                btn += '<button type="button" class="btn-danger btn btn-outlline p-action">';
                                btn += '<i class="fas fa-print"></i>';
                                btn += '</button>';
                                btn += '</a>'
                            }
                        }

                    }
                }
                return btn;
            }
        },
        {
            "targets": -6,
            "data": null,
            "render": function (data, type, row, meta) {
                var num = meta.row + 1;
                return num;
            }
        }
    ],
    "language": {
        "aria": {
            "sortAscending": ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        },
        "emptyTable": "Tidak ada data ",
        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty": "No entries found",
        "infoFiltered": "(filtered1 from _MAX_ total entries)",
        "lengthMenu": "_MENU_ entries",
        "search": "Search:",
        "zeroRecords": "Tidak ada data yang ditemukan"
    },

    responsive: false,

    "order": [
        [0, 'asc']
    ],

    "lengthMenu": [
        [5, 10, 15, 20, -1],
        [5, 10, 15, 20, "All"]
    ],
    "pageLength": 10,
    "destroy": true,
    "scrollX": true
});



function coba() {
    setTimeout(function () {
        table.ajax.reload()
        coba();
    }, 10000);
}
coba()
$('.btn-navbar-toggler').on("click", function () {
    $(this).toggleClass('open')
    $('.row-admin').toggleClass('collapsed')
});
var ctx = document.getElementById('laporanChart').getContext("2d");
var gradientFill = ctx.createLinearGradient(0, 0, 0, 500);
gradientFill.addColorStop(0, "rgba(0, 88, 122, 1)");
gradientFill.addColorStop(1, "rgba(255, 255, 255, .4)");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: "Data",
            borderColor: "#008891",
            pointBorderColor: "#ff0",
            pointBackgroundColor: "#80b6f4",
            pointHoverBackgroundColor: "#ff0",
            pointHoverBorderColor: "#80b6f4",
            pointBorderWidth: 6,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 3,
            pointRadius: 3,
            fill: true,
            backgroundColor: gradientFill,
            data: [12, 19, 3, 5, 20, 3],
            borderWidth: 4
        }]
    }
});

function ShowPengaduan(id) {
    $('.page').data('title')
    $.ajax({
        url: url + "/admin/pengaduan/" + id,
        type: "PUT",
        data: {
            id: id
        },
        dataType: 'JSON',
        success: function (res) {
            var data = res.pengaduan[0]
            if (level == 'petugas' && page == 'pengaduan' && data.status == '0') {
                var button = `<button class="btn btn-warning" type="button" onclick="verify(` + data.id_pengaduan + `)">
                                <i class="fas fa-check mr-2"></i>Verify
                             </button>`
            } else {
                if (data.status == '0') {
                    var status = 'verify'
                } else {
                    var status = data.status
                }
                var button = '<h4 class="title">' + status + '</h4>'
            }
            $('#MDPengaduan').html(`
                <div class="container-fluid px-3">
                    ` + button + `
                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="judul" class="title">Judul</label>
                            <input type="text" class="form-control" value="` + data.judul + `">
                        </div>
                        <div class="form-group col-6">
                            <label for="tanggal" class="title"Tanggal>Tanggal Peristiwa</label>
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
                            <textarea class="form-control detailIsi" value=""cols="30" rows="10">` + data.isi + `</textarea>
                            </div>
                            <div class="col-4">
                            <label for="isi" class="title">Lampiran</label>
                            <img class="radius-10 w-100" src="` + $('.modal').data('lampiran') + '/' + data.lampiran + `" >
                            </div>
                            </div>
                            </div>
                            `)
            $('.modal-body input ,.detailIsi').attr('disabled', 'disabled')
        }
    })
    $('.btn-modal').click()
}

function verify(id) {
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda Akan Menverifikasi Pengaduan Ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya , Verifikasi Sekarang'
    }).then((result) => {
        if (result.value) {
            var id_petugas = $('.admin').data('id')
            $.ajax({
                url: url + '/admin/pengaduan',
                type: 'PATCH',
                data: {
                    id: id,
                    id_petugas: id_petugas
                },
                dataType: 'JSON',
                success: function (res) {
                    table.ajax.reload()
                    Swal.fire(res.title, res.message, res.type)
                }


            })
        } else {
            Swal.fire(
                'Cancelled',
                'Batal memverifikasi :)',
                'error'
            )
        }
    })
}

function tanggapi(id, id_petugas) {
    $('#id_Pg').val(id)
    $('#id_pts').val(id_petugas)
    $('#isiTanggapan').val('')
    $('.btnTanggapan').click()
}

function sendTanggapan() {
    var data = $('#formTanggapan').serialize()
    $.ajax({
        url: url + '/admin/tanggapan',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        success: function (res) {
            Swal.fire(res.title, res.message, res.type)
            $('#modalClose').click()
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                Swal.fire('Oops!', 'Pengaduan Sudah Ditanggapi', 'warning');


            }
        }


    })
}

function showTanggapan(id) {
    $.ajax({
        url: url + '/admin/tanggapan',
        type: 'PUT',
        data: {
            id_pengaduan: id
        },
        success: function (res) {
            $('#tanggapanIsi').text(res)
        }
    })
}

function verifyRegistrasi(id) {
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda Akan Menverifikasi Registrasi Ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya , Verifikasi Sekarang'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url + '/admin/register/' + id,
                type: 'PUT',
                data: {
                    id_petugas: id
                },
                success: function (res) {
                    Swal.fire(res.title, res.message, res.type);
                }
            })
        } else {
            Swal.fire(
                'Cancelled',
                'Batal memverifikasi :)',
                'error'
            )
        }
    })

}





function saveProfile() {
    $('span').remove('.invalid-feedback');
    $('input , select').removeClass('is-invalid');
    var form = $('form')[0];
    var formData = new FormData(form);
    $.ajax({
        url: url + "/admin/profile",
        method: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data.avatar != "") {
                $('#oldAvatar').val(data.avatar)
            }
            Swal.fire('Your profile', data.message, data.type)

        },
        error: function (xhr) {
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

function rejectRegistrasi(id) {
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda Akan Menghapus Registrasi Ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya , Hapus Sekarang'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url + '/admin/register',
                type: 'DELETE',
                data: {
                    id_petugas: id
                },
                success: function (res) {
                    Swal.fire(res.title, res.message, res.type);
                }
            })
        } else {
            Swal.fire(
                'Cancelled',
                'Batal memverifikasi :)',
                'error'
            )
        }
    })
}

function rejectPengaduan(id) {
    $('#idP').val('');
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda Akan Mengembalikan Pengaduan Ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya , Kembalikan Sekarang'
    }).then((result) => {
        if (result.value) {
            $('.btnReject').click()
            $('#idP').val(id)
            $('#formPesan textarea').val('');
        } else {
            Swal.fire(
                'Cancelled',
                'Batal memverifikasi :)',
                'error'
            )
        }
    })
}

function Reject() {
    var data = $('#formPesan').serialize()
    $.ajax({
        url: url + '/admin/reject',
        type: 'POST',
        data: data,
        success: function (res) {
            Swal.fire(res.title, res.message, res.type)
            $('#modalClose').click()
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                Swal.fire('Oops!', 'Pengaduan Sudah dikembalikan', 'warning');


            }
        }

    })
}
