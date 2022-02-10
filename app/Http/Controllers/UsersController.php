<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('nik', Auth::user()->nik)->Orderby('created_at', 'desc')->get();
        $countPengaduan = count($pengaduan);
        return view(
            'user.dashboard',
            [
                'countPengaduan' => $countPengaduan,
                'pengaduan' => $pengaduan->take(3),
            ]
        );
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['username', 'password']))) {
            return response()->json([
                'title' => 'login',
                'message' => 'Login Berhasil',
                'type' => 'success'
            ]);
        }

        return response()->json([
            'title' => 'login',
            'message' => 'Username dan password Salah',
            'type' => 'error'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return 'success';
    }

    public function next(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|min:4',
            'username' => 'required|string|min:6|unique:users,username',
            'password' => 'required|min:8'
        ]);
    }

    public function registrasi(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|min:4',
            'username' => 'required|string|min:6|unique:users,username',
            'password' => 'required|min:8',
            'nik' => 'required|unique:users,nik|size:16',
        ]);

        $user = new User();
        $user->nik = $request->nik;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            'nama' => $request->nama,
            'text' => $request->nama . " berhasil mendaftar"
        ]);
    }

    public function updateProfile(Request $request)
    {
        if ($request->password != null) {
            $this->validate($request, [
                'password' => 'min:8|max:15'
            ]);
            $password = Hash::make($request->password);
            User::where('id', $request->id)
                ->update([
                    'password' => $password,
                ]);
        };
        if (isset($request->avatar)) {
            $this->validate($request, [
                'avatar' => 'image|mimes:jpg,png,jpeg|max:2048'
            ]);

            if ($request->oldAvatar != 'avatar.png') {
                unlink('img/avatar/' . $request->oldAvatar);
            }
            $name = 'user_' . $request->username;
            $avatar = $request->file('avatar');
            $newAvatar = $name . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('img/avatar'), $newAvatar);
            User::where('username', $request->username)
                ->update([
                    'avatar' => $newAvatar,
                ]);
            $avatarFile = $newAvatar;
        } else {
            $avatarFile = '';
        }
        $this->validate($request, [
            'nama' => 'required|string|min:4',
            'alamat' => 'required|string|max:30',
            'gender' => 'required|string|max:10',
            'telp' => 'required|min:11|max:12'

        ]);
        User::where('username', $request->username)
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'gender' => $request->gender,
                'telp' => $request->telp,
            ]);
        return response()->json([
            'message' => 'success to update your profile',
            'type' => 'success',
            'avatar' => $avatarFile
        ]);
    }
}
