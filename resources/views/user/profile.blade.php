@extends('template.user')
@section('title')
Profile
@endsection
@section('avatar')
<li class="mb-5" data-toggle="tooltip" title="{{Auth::user()->name}}">
    <img src="{{url('img/avatar')}}/{{Auth::user()->avatar}}" class="rounded-circle" id="avatarImg" width="40px" height="40px" alt="">
</li>
@endsection

@section('header')
<h5 class="title mr-3 px-3 bg-darkGreen py-2 mb-2 px-4  radius-10"><i class="fas fa-user mt-1"></i> / My Profile</h5>
<div class="data" data-uId="{{Auth::user()->id}}"></div>

@endsection

@section('panel-body')
<div class="panel-body position-relative mt-5">
    <div class="bg-darkGreen hello py-4 px-3 row mx-0 radius-10 ">
        <div class="col-md-7 ">
            <p id="dateNow"></p>
            <h4 class="title text-25 mt-3">Haii {{ Auth::user()->nama }} !</h4>
            <p class="text text-16">Disini anda bisa melengkapi atau mengupdate data pribadi anda </p>
        </div>
        <div class="col-md-2 ml-auto md-block pl-5 text-right">
            <img src="{{url('img/avatar.png')}}" class="w-100 " alt="">
        </div>
    </div>
    <div class="row mx-0 mt-5">
        <div class="col-md-5 row text-center mx-0 justify-content-center position-relative">
            <div class="fotoProfile bg-dark rounded-circle overflow-hidden ">
                <img id="AvatarPreview" src="{{url('img/avatar')}}/{{Auth::user()->avatar}}" alt="">
                <div class="w-100 profilepot">
                    <i class="fas fa-camera text-light" onclick="changePhoto()"></i>
                </div>
            </div>
            <h5 class="email w-100 title text-25" style="transform:translateY(-140px)">{{Auth::user()->username}}</h5>
        </div>
        <div class="col-md-7">
            <form action="" class="w-100 formProfile" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="file" class="d-none" name="avatar" id="avatar">
                <input type="hidden" class="w-100 d-none" name="oldAvatar" id="oldAvatar" value="{{Auth::user()->avatar}}">
                <input type="hidden" name="username" id="" value="{{Auth::user()->username}}">
                <h3 class="title text-25">Edit Profile</h3>
                <hr>
                <div class="form-group">
                    <label for="name" class="title">nama</label>
                    <input type="text" class="form-control radius-20 px-4" id="nama" name="nama" value="{{Auth::user()->nama}}">
                </div>
                <div class="form-group">
                    <label for="password" class="title">Password</label>
                    <div class=" d-flex position-relative">
                        <input type="password" class="form-control radius-20 px-4 col-11 border-right-0" id="password" name="password" placeholder="Enter New Password">
                        <div class="input-group-prepend position-absolute ml-auto right-0 z-index-2" style="height: 38px;">
                            <div class="input-group-text border-0 bg-darkBlue text-light rounded-circle"><i toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat" class="title">Alamat</label>
                    <input type="text" class="form-control radius-20 px-4" id="alamat" name="alamat" value="{{Auth::user()->alamat}}">
                </div>
                <div class="form-group">
                    <label for="number" class="title">No Telepon</label>
                    <input type="number" class="form-control radius-20 px-4" id="telp" name="telp" value="{{Auth::user()->telp}}">
                </div>
                <div class="form-group">
                    <label for="gender" class="title">Jenis kelamin</label>
                    <select class="form-control radius-20 px-4 " id="gender" name="gender">
                        <option selected disabled>Pilih jenis kelamin</option>
                        <option value="perempuan">Perempuan</option>
                        <option value="laki-laki">Laki Laki</option>
                    </select>
                </div>
                <button class="text-light title btn bg-darkGreen mb-5" type="button" style="float: right;" onclick="saveProfile()">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.profile').addClass('active')
    $("#gender option[value = '" + '{{Auth::user()->gender}}' + "']").attr("selected", "selected")
</script>
@endsection