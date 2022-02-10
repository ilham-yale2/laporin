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
    <link rel="stylesheet" type="text/css" href="{{url('css/Chart.min.css')}} " />
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.dataTables.css')}} " />
    <link rel="stylesheet" type="text/css" href="{{url('css/datatables.min.css')}} " />
    <link rel="stylesheet" type="text/css" href="{{url('css/dataTables.bootstrap4.min.css')}} " />
    <link rel="stylesheet" type="text/css" href="{{url('css/admin.css')}} " />

</head>

<body>
    <div class="row mx-0 row-admin">
        @csrf
        <div class="admin" data-level="{{Auth::user()->level}}" data-id="{{Auth::user()->id}}"></div>

        <div class="baseUrl" data-url="{{url('/')}}"></div>
        <aside class="position-fixed shadow bg-light sidebar-admin">
            <div class="w-100 text-center">
                <img src="{{url('img/logo.png')}}" width="40" alt="">
                <h4 class="d-inline-block ml-3 laporin-text">Laporin</h4>
            </div>
            <ul class="text-white sidebar-link">
                <li class="dashboard ">
                    <a href=" {{url('/admin/')}}">
                        <div class="icon-link py-2 px-3 radius-10 ">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="text-link text-18">
                            Dashboard
                        </div>
                    </a>
                </li>
                <li class="pengaduan">
                    <a href="{{route('admin.pengaduan')}}">
                        <div class="icon-link py-2 px-3 radius-10 ">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="text-link ml-2 text-18">
                            Laporan
                        </div>
                    </a>
                </li>
                <li class="users">
                    <a href="{{route('admin.users')}}">
                        <div class="icon-link py-2 px-3 radius-10 ">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="text-link text-18">
                            Users
                        </div>
                    </a>
                </li>
                @if(Auth::user()->level == 'petugas')
                <li class="reg">
                    <a href="{{route('admin.reg')}}">
                        <div class="icon-link py-2 px-3 radius-10 ">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-link text-18">
                            Registrasi
                        </div>
                    </a>
                </li>
                @endif
                <li class="profile">
                    <a href="{{route('admin.profile')}}">
                        <div class="icon-link py-2 px-3 radius-10 ">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="text-link ml-2 text-18">
                            Profile
                        </div>
                    </a>
                </li>
            </ul>
        </aside>
        <nav class="navbar-admin  position-fixed d-flex bg-light pt-4">
            <div class="btn btn-navbar-toggler">
                <div></div>
                <div></div>
            </div>
            <div class=" ml-auto position-relative ml-auto d-inline-block">
                <a href="{{route('admin.logout')}}"><button class="btn btn-danger rounded-pill px-4"><i class="fas fa-power-off"></i> Logout</button></a>
            </div>
        </nav>
        <div class="container-admin mt-5 p-3" style="min-height: 93vh;">
            @yield('content')
        </div>
    </div>
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
    <script src="{{url('js/all.min.js')}}"></script>
    <script src="{{url('swal/all.min.js')}}"></script>
    <script src="{{url('js/slick.js')}}"></script>
    <script src="{{url('js/jquery.dataTables.js')}}"></script>
    <script src="{{url('js/datatables.min.js')}}"></script>
    <script src="{{url('js/Chart.min.js')}}"></script>
    <script src="{{url('js/admin.js')}}"></script>
    <script>
        function removeThis(kelas) {
            $("." + kelas + "").remove();
        }
    </script>
    @yield('script')


</body>


</html>