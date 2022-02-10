<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{url('img/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
</head>

<body>
    <div class="container">
        <button class="btn-back p-absolute" onclick="redirect('/')">Home</button>
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="post" id="login">
                    {{csrf_field()}}
                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <div class="icon-input">
                            <i class=" fas fa-user"></i>
                        </div>
                        <input class="email-login" type="text" placeholder="Username" name="username">
                    </div>
                    <div class="input-field p-relative">
                        <div class="icon-input">
                            <i class=" fas fa-lock"></i>
                        </div>
                        <input class="password-login" type="password" id="password" placeholder="Password" name="password">
                        <div style="right: 30px;" id="password-toggle" class="icon-input p-absolute">
                            <i class="fas fa-eye-slash"></i>
                        </div>
                    </div>
                    <button type="button" onclick="login()" class="btn solid">Login</button>
                    <!-- <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>

                    </div> -->

                </form>
                <form action="" class="sign-up-form" method="post" id="register">
                    <h2 class="title">Sign Up</h2>
                    <div class="input-field" id="first">
                        <div class="icon-input">
                            <i class=" fas fa-user"></i>
                        </div>
                        <input class="nama" type="text" placeholder="Nama" name="nama" id="nama">
                    </div>
                    <div class="input-field" id="first-1">
                        <div class="icon-input">
                            <i class=" fas fa-user"></i>
                        </div>
                        <input class="username" type="text" placeholder="Username" name="username" id="username">
                    </div>
                    <div class="input-field p-relative" id="first-2">
                        <div class="icon-input">
                            <i class=" fas fa-lock"></i>
                        </div>
                        <input class="password" type="password" id="password2" placeholder="Password" name="password">
                        <div style="right: 30px;" id="password-toggle2" class="icon-input p-absolute">
                            <i class="fas fa-eye-slash"></i>
                        </div>
                    </div>
                    <button type="button" class="btn solid" onclick="next()" id="first-3">Next <i class="fas fa-arrow-right" style="margin-left: .5rem;"></i></button>
                    <p id="second" class="d-none">Masukkan NIK anda :)</p>
                    <div class="input-field d-none" id="second-1">
                        <div class="icon-input">
                            <i class=" fas fa-user"></i>
                        </div>
                        <input class="nik" type="text" placeholder="Nomor Induk Kependudukan" name="nik" id="nik">
                    </div>
                    <button id="second-2" type="button" class="btn solid d-none" style="margin-top: .8rem;" onclick="registrasi()">Sign up</button>
                    <!-- <p class="social-text">Or Sign Up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>

                    </div> -->

                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New Here ?</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga, eveniet. Voluptas, itaque!</p>
                    <button class="btn transparent" id="sign-up-btn" onclick="resetData()">Sign Up</button>
                </div>
                <img src="{{url('img/login.svg')}}" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of Us ?</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga, eveniet. Voluptas, itaque!</p>
                    <button class="btn transparent" id="sign-in-btn" onclick="resetData()">Sign in</button>
                </div>
                <img src="{{url('img/signup.svg')}}" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="{{url('js/all.min.js')}}"></script>
    <script src="{{url('swal/all.min.js')}}"></script>
    <script src="{{url('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
</body>

</html>