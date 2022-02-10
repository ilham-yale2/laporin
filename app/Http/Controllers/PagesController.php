<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;
use App\Models\Admin;
use App\Models\Mail;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function laporPage()
    {
        return view('user.lapor');
    }

    public function profilePage()
    {
        return view('user.profile');
    }

    public function pengaduanAdmin()
    {
        $admins = Pengaduan::where('status', 'proses')->get();
        return view('admin.pengaduan', compact(('admins')));
    }
    public function usersAdmin()
    {

        $users = User::all();
        $admins = Admin::where('status', 1)->get();
        return view('admin.users', compact('users', 'admins'));
    }

    public function registrasiAdmin()
    {
        return view('admin.registrasi');
    }

    public function registerAdmin()
    {
        $admins = Admin::where('status', 0)->get();
        return view('admin.register', compact('admins'));
    }

    public function profileAdmin()
    {
        return view('admin.profile');
    }

    public function home()
    {

        $tanggapanCount = count(Tanggapan::all());
        $userCount = count(User::all());
        $pengaduanCount = count(Pengaduan::all());
        $count = [
            'tanggapan' => $tanggapanCount,
            'user' => $userCount,
            'pengaduan' => $pengaduanCount
        ];
        return view('index', compact('count'));
    }

    public function mails()
    {

        $mails =  Mail::where('nik', Auth::user()->nik)->orderby('created_at', 'desc')->get();
        return view('user.mails', compact('mails'));
    }
}
