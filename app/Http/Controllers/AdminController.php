<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Admin;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $adminCount = count(Admin::where('status', '1')->get());
        $userCount = count(User::all());
        $pengaduanCount = count(Pengaduan::all());
        $count = [
            'admin' => $adminCount,
            'user' => $userCount,
            'pengaduan' => $pengaduanCount
        ];
        $admins = Admin::where('act', '>', '0')->orderBy('act', 'desc')
            ->take(3)->get();
        $activity = Activity::where('id_act', '>', '0')->orderBy('created_at', 'desc')->take(30)->get();
        return view('admin.dashboard', compact('admins', 'activity', 'count'));
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|min:6',
            'password' => 'required|string'
        ]);
        $pre = Admin::where('username', $request->username)->get();
        if ($pre[0]['status'] != 1) {
            return response()->json([
                'title' => 'login',
                'message' => 'Akun anda belum diverifikasi',
                'type' => 'error'
            ]);
        }

        if (Auth::guard('admin')->attempt($request->only(['username', 'password']))) {
            return response()->json([
                'title' => 'login',
                'message' => 'Login Berhasil',
                'type' => 'success'
            ]);
        }

        return response()->json([
            'title' => 'login',
            'message' => 'Username dan password salah',
            'type' => 'warning'
        ]);
    }

    public function registrasi(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|min:4',
            'username' => 'required|string|min:6|unique:admins,username',
            'password' => 'required|min:8',
        ]);
        $admin = new Admin();
        $admin->nama_petugas = $request->nama;
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->save();

        return response()->json([
            'title' => 'Registrasi',
            'message' => $request->nama . " berhasil mendaftar",
            'type' => 'success'
        ]);
    }

    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function verifyAdmin($id)
    {
        Admin::where('id', $id)
            ->update([
                'status' => 1
            ]);

        return response()->json([
            'title' => 'Success',
            'message' => 'Anda berhasil menverifikasi registrasi',
            'type' => 'success'
        ]);
    }

    public function update(Request $request)
    {

        if ($request->password != null) {
            $this->validate($request, [
                'password' => 'min:8|max:15'
            ]);
            $password = Hash::make($request->password);
            Admin::where('username', $request->username)
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
            $name = 'admin' . '_' . $request->username;
            $avatar = $request->file('avatar');
            $newAvatar = $name . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('img/avatar'), $newAvatar);
            Admin::where('username', $request->username)
                ->update([
                    'avatar' => $newAvatar,
                ]);

            Activity::where('username', $request->username)
                ->update([
                    'avatar' => $newAvatar
                ]);
            $avatarFile = $newAvatar;
        } else {
            $avatarFile = '';
        }
        $this->validate($request, [
            'nama' => 'required|string|min:4',
            'alamat' => 'required|string|max:30',
            'telp' => 'required|min:11|max:12'

        ]);
        Admin::where('username', $request->username)
            ->update([
                'nama_petugas' => $request->nama,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
            ]);
        return response()->json([
            'message' => 'success is updated',
            'type' => 'success',
            'avatar' => $avatarFile
        ]);
    }
    public function rejectAdmin(Request $request)
    {
        Admin::find($request->id_petugas)->delete();
        return response()->json([
            'title' => 'Data Registrasi',
            'message' => 'berhasil Dihapus',
            'type' => 'success'
        ]);
    }
}
