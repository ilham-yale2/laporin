@extends('template.admin')
@section('title')
Data Pengaduan
@endsection
@section('content')
<div class="row mx-0 mt-5 page" data-title="pengaduan">
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
                    <th scope="col">Tanggal</th>
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
                <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" data-dismiss="modal" id="modalClose">Close</button>
            </div>
        </div>
    </div>
</div>
<button class="d-none btnTanggapan" data-toggle="modal" data-target="#modalTanggapan"></button>
<button class="d-none btnReject" data-toggle="modal" data-target="#modalReject"></button>
<div class="modal fade" id="modalTanggapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content radius-20 position-relative">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Beri Tanggapan</h5>
            </div>
            <div class="modal-body">
                <form id="formTanggapan" method="POST">
                    <input type="hidden" id="id_Pg" name="id_pengaduan" value="">
                    <input type="hidden" id="id_pts" name="id_petugas" value="">
                    <textarea class="form-control" name="isi" id="isiTanggapan" cols="30" rows="10"></textarea>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" onclick="sendTanggapan()"><i class="fas fa-paper-plane mr-2"></i> Kirim</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalShowTanggapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content radius-20 position-relative">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tanggapan</h5>
            </div>
            <div class="modal-body p-4">
                <div class="w-100 radius-10 p-3" id="tanggapanIsi" style="background-color: #ecedf0;"></div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" data-dismiss="modal">Close </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalReject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content radius-20 position-relative">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Beri Pesan</h5>
            </div>
            <div class="modal-body">
                <form id="formPesan" method="POST">
                    <input type="hidden" name="id_pengaduan" id="idP">
                    <textarea class="form-control" name="isi" cols="30" rows="10"></textarea>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" onclick="Reject()"><i class="fas fa-paper-plane mr-2"></i> Kirim</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.sidebar-link li').removeClass('.active')
    $('.pengaduan').addClass('active')
</script>
@endsection