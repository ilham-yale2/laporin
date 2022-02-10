@extends('template.admin')

@section('title')
Profile
@endsection

@section('content')
<div class="row mx-0 pt-5 justify-content-center">
    <div class="col-md-12 row text-center mx-0 justify-content-center position-relative">
        <div class="fotoProfile bg-dark rounded-circle overflow-hidden ">
            <img id="ProfilePreview" src="{{url('img/avatar')}}/{{Auth::user()->avatar}}" alt="">
            <div class="w-100 profilepot">
                <i class="fas fa-camera text-light" onclick="changePhoto()"></i>
            </div>
        </div>
        <h5 class="email w-100 title text-25 mt-4">{{Auth::user()->username}}</h5>
    </div>
    <div class="col-md-10 mt-5 border-warning">
        <form action="" class="row mx-0" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="file" class="d-none" name="avatar" id="avatarField">
            <input type="hidden" class="w-100 d-none" name="oldAvatar" id="oldAvatar" value="{{Auth::user()->avatar}}">
            <input type="hidden" name="username" id="" value="{{Auth::user()->username}}">
            <div class="form-group col-6">
                <label for="name" class="title">Nama</label>
                <input type="text" class="form-control radius-20 px-4" id="nama" name="nama" value="{{Auth::user()->nama_petugas}}">
            </div>
            <div class="form-group col-6">
                <label for="password" class="title">Password</label>
                <div class=" d-flex position-relative">
                    <input type="password" class="form-control radius-20 px-4 col-10 p-0 " id="password" name="password" placeholder="Enter New Password">
                    <div class="input-group-prepend position-absolute ml-auto right-0 z-index-2" style="height: 38px;">
                        <div class="input-group-text border-0 bg-darkBlue text-light rounded-circle"><i toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group col-6">
                <label for="alamat" class="title">Alamat</label>
                <input type="text" class="form-control radius-20 px-4" id="alamat" name="alamat" value="{{Auth::user()->alamat}}">
            </div>
            <div class="form-group col-6">
                <label for="number" class="title">No Telepon</label>
                <input type="number" class="form-control radius-20 px-4" id="telp" name="telp" value="{{Auth::user()->telp}}">
            </div>
            <button class="text-light title rounded-pill px-4 btn bg-darkGreen mb-5 ml-auto mr-3" type="button" onclick="saveProfile()">Simpan</button>
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    $('.profile').addClass('active')
</script>
@endsection