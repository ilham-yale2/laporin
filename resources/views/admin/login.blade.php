<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{url('img/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/admin.css')}}">
    <link rel="stylesheet" href="{{url('css/parent.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/all.min.css')}} " />
    <link rel="stylesheet" type="text/css" href="{{url('swal/all.min.css')}} " />

</head>

<body class="">
    <div class="row mx-0  bg-darkBlue" style="height: 100vh;">
        <div class="box-login my-5 col-8 col-md-4 radius-10 middle-y">
            <div class="row text-center">
                <div class="p-3 bg-light mx-auto lock">
                    <i class="fas fa-lock fa-3x text-darkGreen"></i>
                </div>
            </div>
            <h2 class="title text-center">Login Petugas </h2>

            <form class="mt-4" id="formAdmin" action="{{route('admin.handleLogin')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="text-20 text" for="name">Username</label>
                    <input class="radius-10 form-control" type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label class="text-20 text" for="password">Password</label>
                    <input class="radius-10 form-control" type="password" id="password" name="password">
                </div>
                <button class="btn bg-darkGreen title radius-20 py-2 w-100 text-light text-20 mb-3" onclick="loginPetugas()" type="button">Login</button>
            </form>
        </div>
        <div class="col-md-8 ml-auto">
            <img src="{{url('img/login.svg')}}" class="img-login w-100 position-absolute bottom-0 pr-5 right-0" alt="">
        </div>
    </div>
    <script src="{{url('js/all.min.js')}}"></script>
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('swal/all.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        });


        function loginPetugas() {
            $('span').remove('.invalid-feedback');
            $('input , select').removeClass('is-invalid');
            var url = $('form').prop('action')
            var form = $('#formAdmin').serialize();
            $.ajax({
                url: url,
                method: 'POST',
                data: form,
                success: function(res) {
                    Swal.fire(res.title, res.message, res.type)

                    if (res.type == 'success') {
                        document.location.href = '/admin'
                    }
                },
                error: function(xhr) {
                    var res = xhr.responseJSON;
                    if ($.isEmptyObject(res) == false) {
                        $.each(res.errors, function(key, value) {
                            $('#' + key)
                                .closest('.form-control')
                                .addClass('is-invalid')
                                .after(' <span class="invalid-feedback"><strong>' + value + '</strong> </span> ')
                        })
                    }
                }
            })

        }
    </script>

</body>

</html>