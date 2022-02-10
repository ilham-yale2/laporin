@extends('template.user')
@section('title')
Mails
@endsection
@section('avatar')
<li class="mb-5" data-toggle="tooltip" title="{{Auth::user()->name}}">
    <img src="{{url('img/avatar')}}/{{Auth::user()->avatar}}" class="rounded-circle" id="avatarImg" width="40px" height="40px" alt="">
</li>
@endsection

@section('header')
<h5 class="title mr-3 px-3 bg-darkGreen py-2 mb-2 px-4  radius-10"><i class="fas fa-envelope mt-1"></i> / Mails</h5>
<div class="data" data-uId="{{Auth::user()->id}}"></div>

@endsection

@section('panel-body')
@foreach($mails as $mail)
<div class="alert mail alert-{{$mail->type}} d-flex shadow-sm">
    <div class="d-block">
        <p class="mb-0 text text-18">{{$mail->category}}</p>
        <p class="text-secondary mb-0 text text-14">{{\Carbon\Carbon::parse($mail->created_at)->diffForHumans()}}</p>
    </div>
    <div class="d-block ml-auto">
        <div class="btn rounded-pill bg-light " data-toggle="modal" data-target="#modalMail{{$loop->iteration}}"><i class="fas fa-eye"></i></div>
    </div>
</div>
<div class="modal fade" id="modalMail{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content radius-20 position-relative">
            <div class="modal-header">
                <h5 class="modal-title title" id="exampleModalLongTitle">Mail</h5>
            </div>
            <div class="modal-body p-4">
                <h6 class="text-dark title">
                    By : {{$mail->nama_petugas}}
                </h6>

                <div class="px-4 radius-10 text py-2 mx-2 my-3" style="background-color: #ecedf0;">
                    <p class="text-16">
                        <b>Judul Pengaduan</b> : {{$mail->judul_pengaduan}}.
                    </p>
                    {{$mail->message}}
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn position-absolute radius-20 px-4 bg-darkBlue text-light title" style="bottom: -20px;" data-dismiss="modal">Close </button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('script')
<script>
    $('.mails').addClass('active')
</script>
@endsection