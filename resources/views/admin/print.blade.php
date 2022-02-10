<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Pengaduan</title>
    <link rel="shortcut icon" href="{{url('img/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/system.css')}}">
    <link rel="stylesheet" href="{{url('css/parent.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/all.min.css')}} " />
</head>

<?php

$tgl = explode(' ', $data->created_at)
?>

<body>
    <div class="container">
        <div class="w-100 text-center mt-3">
            <img src="{{url('img/logo.png')}}" width="50px" alt="">
            <h3 class="title text-dark">LaporIn</h3>
            <h4 class=" text text-secondary">Forum Pengaduan Masyarakat</h4>
            <hr>
        </div>
        <div class="mt-5">
            <table>
                <tr>
                    <td class="text-20 title pr-5">Judul</td>
                    <td class="text-20 title pr-3">:</td>
                    <td>{{$data->judul}}</td>
                </tr>
                <tr>
                    <td class="text-20 title pr-5">Oleh</td>
                    <td class="text-20 title pr-3">:</td>
                    <td>{{$data->nik}}</td>
                </tr>
                <tr>
                    <td class="text-20 title pr-5">Tanggal Kejadian</td>
                    <td class="text-20 title pr-3">:</td>
                    <td>{{$data->tanggal}}</td>
                </tr>
                <tr>
                    <td class="text-20 title pr-5">Wilayah</td>
                    <td class="text-20 title pr-3">:</td>
                    <td>{{$data->wilayah}}</td>
                </tr>
                <tr>
                    <td class="text-20 title pr-5">Kategori</td>
                    <td class="text-20 title pr-3">:</td>
                    <td>{{$data->kategori}}</td>
                </tr>
                <tr>
                    <td class="text-20 title pr-5">Telepon</td>
                    <td class="text-20 title pr-3">:</td>
                    <td>{{$user->telp}}</td>
                </tr>
            </table>
            <div class="mt-5 row mx-0">
                <div class="col-5 p-0">
                    <img src="{{url('img/lampiran')}}/{{$data->lampiran}}" class="w-100 radius-10" alt="">
                </div>
                <div class="col-7">
                    "
                    {{$data->isi}}
                    "
                </div>
            </div>
            <div class="d-flex mt-5 pt-4 ">
                <div class="d-block ml-auto">
                    <h5 class="ml-auto title">{{$data->wilayah}}, {{$tgl[0]}} </h5>
                    <div class="text-center">
                        <img src="{{url('img/avatar')}}/{{$user->avatar}}" class="imgAvatarPrint" width="80px" alt="">
                    </div>
                    <hr>
                    <p class="text-center mt-2 text text-18">{{$user->nama}}</p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/all.min.js')}}"></script>
    <script>
        window.print()
    </script>
</body>

</html>l