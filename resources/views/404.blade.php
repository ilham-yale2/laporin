<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Found</title>
    <link rel="shortcut icon" href="{{url('img/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/system.css')}}">
    <link rel="stylesheet" href="{{url('css/parent.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/all.min.css')}} " />
</head>

<body>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-8 mt-5">
                <img src="{{url('img/404.png')}}" class="w-100" alt="">
            </div>
        </div>
        <h1 class="title">NOT FOUND</h1>
        <button class="btn btn-primary" onclick="goback()"><I class="fas fa-arrow-left"></I> Back</button>
    </div>
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/all.min.js')}}"></script>

    <script>
        function goback() {
            window.history.back()
        }
    </script>
</body>

</html>