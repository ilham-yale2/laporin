@extends('template.admin')
@section('title')
Users
@endsection
@section('content')

<!-- @if(Auth::user()->level != 'admin')
<script>
    document.location.href = "{{route('admin.home')}}"
</script>
@endif -->

<div class="row mx-0">
    <div class="w-100 px-3 mx-3 radius-10 mt-5 py-3 card">
        <div class="admin" data-level="{{Auth::user()->level}}"></div>
        <div class="card-header-user d-flex mb-4">
            <button class=" btn btn-primary mr-3" id="btnUser">Users</button>
            <button class=" btn btn-primary mr-3" id="btnAdmin">Admin</button>
        </div>
        <div id="dataUser">
            <h3 class="dataName border-bottom mb-4">Data User</h3>
            <table class="table table-bordered table-hover dataTable" id="users">
                <thead class="bg-darkGreen text-dark text">
                    <tr>
                        <th scope="col" width="1%">No</th>
                        <th scope="col">Foto Profile</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col" width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)

                    <?php $tgl = explode(' ', $user->created_at); ?>
                    <tr>
                        <td> {{ $loop->iteration}} </td>
                        <td> <img src="{{url('img/avatar')}}/{{$user->avatar}}" class="rounded-pill" width="60px" alt=""></td>
                        <td> {{ $user->nama}} </td>
                        <td> {{ $user->username}} </td>
                        <td> {{ $tgl[0]}} </td>
                        <td class="text-center">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalUser"><i class="fas fa-eye"></i></button>
                            <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content radius-20 position-relative">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Detail User</h5>
                                        </div>
                                        <div class="modal-body text-left p-4">
                                            <div class="row mx-0 radius-10 p-3" style="background-color: #ecedf0;">
                                                <div class="col-12 text-center mb-4">
                                                    <img src="{{url('img/avatar')}}/{{$user->avatar}}" class="rounded-pill" width="100px" alt="">
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="title">Username</label>
                                                    <input type="text" class="form-control mb-3" disabled value="{{ $user->username}}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="title">Nama</label>
                                                    <input type="text" class="form-control mb-3" disabled value="{{ $user->nama}}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="title">Tanggal Registrasi</label>
                                                    <input type="text" class="form-control mb-3 " disabled value="{{ $tgl[0]}}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="title">NO Telepon</label>
                                                    <input type="text" class="form-control mb-3" disabled value="{{ $user->telp}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" data-dismiss="modal">Close </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
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
        <div id="dataAdmin" class="d-none">
            <h3 class="dataName border-bottom mb-4">Data Admin</h3>
            <table class="table table-bordered table-hover dataTable" id="admin">
                <thead class="bg-darkGreen text-dark text">
                    <tr>
                        <th width="30px">No</th>
                        <th>Foto Profile</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)

                    <?php $tgl = explode(' ', $admin->created_at); ?>
                    <tr>
                        <td> {{ $loop->iteration}} </td>
                        <td> <img src="{{url('img/avatar')}}/{{$admin->avatar}}" class="rounded-pill" width="60px" alt=""></td>
                        <td> {{ $admin->nama_petugas}} </td>
                        <td> {{ $admin->username}} </td>
                        <td> {{ $admin->level}} </td>
                        <td class="text-center">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modaladmin{{ $loop->iteration}}"><i class="fas fa-eye"></i></button>
                            <div class="modal fade" id="modaladmin{{ $loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content radius-20 position-relative">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Detail admin</h5>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row mx-0 radius-10 text-left p-3" style="background-color: #ecedf0;">
                                                <div class="col-12 text-center mb-4">
                                                    <img src="{{url('img/avatar')}}/{{$admin->avatar}}" class="rounded-pill" width="100px" alt="">
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="title">Username</label>
                                                    <input type="text" class="form-control text mb-3" disabled value="{{ $admin->username}}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="title">Nama Petugas</label>
                                                    <input type="text" class="form-control text mb-3" disabled value="{{ $admin->nama_petugas}}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="title">Tanggal Registrasi</label>
                                                    <input type="text" class="form-control text mb-3 " disabled value="{{ $tgl[0]}}">
                                                </div>
                                                <div class="col-6">
                                                    <label for="" class="title">NO Telepon</label>
                                                    <input type="text" class="form-control text mb-3" disabled value="{{ $admin->telp}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" data-dismiss="modal">Close </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
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
</div>

@endsection

@section('script')
<script>
    $('#users').DataTable()
    $('#admin').DataTable()
    $('#btnAdmin').on('click', function() {
        $('#dataUser').addClass('d-none')
        $('#dataAdmin').removeClass('d-none')
    })
    $('#btnUser').on('click', function() {
        $('#dataUser').removeClass('d-none')
        $('#dataAdmin').addClass('d-none')
    })
    $('.users').addClass('active')
</script>
@endsection