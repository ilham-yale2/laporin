<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{url('img/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/system.css')}}">
    <link rel="stylesheet" href="{{url('css/parent.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/all.min.css')}} " />
    <link rel="stylesheet" type="text/css" href="{{url('swal/all.min.css')}} " />
</head>

<body class="p-2" style="background-color: #01394F;">
    <div class="baseURL" data-url="{{url('/')}}"></div>
    <aside class="sidebar text-center z-index-2 h-100 position-fixed">
        <ul class="px-1 pt-4">
            @yield('avatar')

            <a href="{{url('user/')}}">
                <li data-toggle="tooltip" title="Dashboard" class="nav-aside dashboard">
                    <i class="fas fa-home"></i>
                </li>
            </a>
            <a href="{{url('user/mails')}}">
                <li data-toggle="tooltip" title="Mails" class="nav-aside mails">
                    <i class="fas fa-envelope"></i>
                </li>
            </a>
            <a href="{{url('user/lapor')}}">
                <li data-toggle="tooltip" title="Laporan" class="nav-aside lapor">
                    <i class="far fa-file-alt"></i>
                </li>
            </a>
            <a href="{{url('user/profile')}}">
                <li data-toggle="tooltip" title="Profile" class="nav-aside profile">
                    <i class="far fa-user"></i>
                </li>
            </a>
            <a id="logout" data-url="{{url('/logout')}}">
                @csrf
                <li data-toggle="tooltip" title="Logout" class="nav-aside position-absolute bottom-0 ">
                    <i class="fas fa-sign-out-alt"></i>
                </li>
            </a>
        </ul>
    </aside>
    <div class="position-relative w-100">
        <div class="mr-0 pl-3 wrapper position-absolute right-0 left-0 overflow-hidden radius-10" style="height: 98vh;">
            <div class="h-100 px-3" style="overflow-y: scroll;">
                <div class="d-flex mt-4" style="vertical-align: top;">
                    @yield('header')
                </div>
                <div class="panel-body position-relative mt-5">
                    @yield('panel-body')
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-0 top-0 left-0 justify-content-center align-items-center position-fixed h-100 w-100 d-none" id="loader">
        <div class="loader position-relative">
            <span style="--i:1"></span>
            <span style="--i:2"></span>
            <span style="--i:3"></span>
            <span style="--i:4"></span>
            <span style="--i:5"></span>
            <span style="--i:6"></span>
            <span style="--i:7"></span>
            <span style="--i:8"></span>
            <span style="--i:9"></span>
            <span style="--i:10"></span>
            <span style="--i:11"></span>
            <span style="--i:12"></span>
            <span style="--i:13"></span>
            <span style="--i:14"></span>
            <span style="--i:15"></span>
            <span style="--i:16"></span>
            <span style="--i:17"></span>
            <span style="--i:18"></span>
            <span style="--i:19"></span>
            <span style="--i:20"></span>
            <div class="rocket">
                <i class="fas fa-rocket"></i>
            </div>
        </div>
    </div>
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/user.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
    <script src="{{url('js/all.min.js')}}"></script>
    <script src="{{url('swal/all.min.js')}}"></script>
    <script src="{{url('js/slick.js')}}"></script>
    <script>
        function removeThis(kelas) {
            $("." + kelas + "").remove();
        }
    </script>
    @yield('script')
</body>


</html>