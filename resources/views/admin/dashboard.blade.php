@extends('template.admin')
@section('title')
Dashboard
@endsection
@section('content')
<div class="row mx-0 mt-5 page" data-title="dashboard">
    <div class="col-sm-5">
        <h2>Hello, {{Auth::user()->nama_petugas}}</h2>
        <p class="text-secondary">welcome back</p>
    </div>
    <div class="col-sm-6 d-flex ml-auto user-info">
        <div class="ml-auto box-img radius-10">
            <img src="{{url('img/avatar')}}/{{Auth::user()->avatar}}" class="text-center" alt="">
        </div>
        <div class="d-inline-block ml-3">
            <h4 class="mb-0">{{Auth::user()->username}}</h4>
            <p class="text-secondary">
                @if (Auth::user()->level == 'admin')
                Administrator
                @elseif(Auth::user()->level == 'petugas')
                Petugas
                @endif
            </p>
        </div>
    </div>
</div>
<div class="row mx-0">
    <div class="col-sm-4 ">
        <div class="card py-2 px-4 radius-10 bg-dark border-0">
            <div class="row mx-0" style="align-items: center;">
                <div class="mr-3">
                    <h1 class="text-light mt-3"><i class="fas fa-2x fa-file-alt"></i></h1>
                </div>
                <div class=" col-7">
                    <h5 class="title mb-0 text-light mt-2">{{$count['pengaduan']}}</h5>
                    <h5 class="text-light">Pengaduan</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 ">
        <div class="card py-2 px-4 radius-10 bg-warning border-0">
            <div class="row mx-0" style="align-items: center;">
                <div class="mr-3">
                    <h1 class="text-light mt-3"><i class="fas fa-2x fa-users"></i></h1>
                </div>
                <div class=" col-7">
                    <h5 class="title mb-0 text-light mt-2">{{$count['user']}}</h5>
                    <h5 class="text-light">User</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 ">
        <div class="card py-2 px-4 radius-10 bg-dark border-0">
            <div class="row mx-0" style="align-items: center;">
                <div class="mr-3">
                    <h1 class="text-light mt-3"><i class="fas fa-2x fa-user"></i></h1>
                </div>
                <div class=" col-8">
                    <h5 class="title mb-0 text-light mt-2">{{$count['admin']}}</h5>
                    <h5 class="text-light">Admin & Petugas</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mx-0 mt-5">
    <div class="col-lg-7 col-12 aktivitas">
        <h3 class="text-dark">Aktivitas</h3>
        <div class="aktivitas-list bg-light px-4 py-3 radius-10">
            @foreach($activity as $act)
            @if($loop->iteration % 2 == 0)
            <?php $bg = 'bg-darkBlue' ?>
            @else
            <?php $bg = 'bg-darkGreen' ?>
            @endif

            @if($act->act == 'Memverifikasi Pengaduan')
            <?php $bgAct = 'bg-warning';
            $icon = 'comment'; ?>
            @elseif ($act->act == 'Memberi Tangapan')
            <?php $bgAct = 'bg-success';
            $icon = 'comments';   ?>
            @elseif ($act->act == 'Mengembalikan Pengaduan')
            <?php $bgAct = 'bg-danger';
            $icon = 'exclamation' ?>
            @endif
            <div class="{{$loop->iteration}} row mx-0 align-items-center  py-2 px-3 mt-3 radius-10 position-relative">
                <div class="mr-3 z-index-2">
                    <img src="{{url('img/avatar')}}/{{$act->avatar}}" width="50px" height="50px" class="rounded-circle" style="border: 4px solid #fff;" alt="">
                </div>
                <div class="z-index-2 text-light pr-2 pl-3 border-left">
                    <h5 class="mb-0">{{$act->username}}</h5>
                    <p class="text-14 text-light mb-0">{{$act->level}}</p>
                </div>
                <div class="z-index-2 text-light pl-3 ml-auto border-left " style="min-width: 48%;">
                    <div class="{{$bgAct}} p-1 px-3 radius-20">
                        <i class="fas fa-{{$icon}}"></i>
                        <span class="text-14">
                            {{$act->act}}
                        </span>
                    </div>
                </div>
                <div class="blur position-absolute {{$bg}} left-0 right-0 radius-10 h-100">
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <div class="col-lg-5">
        <h3 class="text-dark">Top Kontibutor</h3>
        <div class="top-list">
            @foreach($admins as $admin)
            <div class="bg-light shadow my-2 radius-10 px-3 py-1 d-flex">
                <img src="{{url('img/avatar')}}/{{$admin->avatar}}" class="rounded-pill" width="50px" alt="">
                <div class="d-inline-block border-left px-3 ml-3">
                    <h5 class="text-dark mb-0">{{$admin->username}}</h5>
                    <p class="text-dark mb-0">{{$admin->level}}</p>
                </div>
                <div class="d-inline-block ml-auto px-5 border-left">
                    <h5 class="text-dark mb-0 mt-2">{{$admin->act}}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row mx-0">
    <div class="w-100 px-3 mx-3 radius-10 mt-2 py-4 card">
        <h3 class="border-bottom pb-2 mb-4">Data Pengaduan</h3>
        <div class="admin" data-level="{{Auth::user()->level}}"></div>
        <table class="table table-bordered table-hover dataTable" id="example">
            <thead class="bg-darkGreen text-dark text">
                <tr>
                    <th scope="col" width="1%">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Oleh</th>
                    <th scope="col">kategori</th>
                    <th scope="col">Tanggal Pengiriman</th>
                    <th scope="col" width="17%">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot class="bg-white mt-3 text">
                <tr>
                    <!-- <th scope="col" width="1%">No</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Oleh</th>
                    <th scope="col">Tanggal Pengiriman</th>
                    <th scope="col" width="5%">Action</th> -->
                </tr>
            </tfoot>
        </table>

    </div>
</div>
<button class="d-none btn-modal" data-toggle="modal" data-target="#modalPengaduan"></button>
<div class="modal fade" id="modalPengaduan" data-lampiran="{{ url('/img/lampiran') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content position-relative">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Pengaduan</h5>
            </div>
            <div class="modal-body" id="MDPengaduan">

            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.sidebar-link li').removeClass('active')
    $('.dashboard').addClass('active')
</script>
@endsection