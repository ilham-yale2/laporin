<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Activity;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TanggapanController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'isi' => 'required|min:30',
            'id_pengaduan' => 'required|unique:tanggapan,id_pengaduan',
            'id_petugas' => 'required'
        ]);

        $pre = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->get();
        Activity::create([
            'avatar' => Auth::user()->avatar,
            'username' => Auth::user()->username,
            'level' => Auth::user()->level,
            'act' => 'Memberi Tangapan'
        ]);
        Admin::where('id', Auth::user()->id)
            ->update([
                'act' => Auth::user()->act + 1
            ]);
        Pengaduan::where('id_pengaduan', $request->id_pengaduan)
            ->update([
                'status' => 'selesai'
            ]);
        $tanggapan = new Tanggapan;
        $tanggapan->id_pengaduan = $request->id_pengaduan;
        $tanggapan->isi = $request->isi;
        $tanggapan->id_petugas = $request->id_petugas;
        $tanggapan->save();
        Mail::create([
            'nik' => $pre[0]->nik,
            'nama_petugas' => Auth::user()->nama_petugas,
            'message' => $request->isi,
            'category' => 'Tanggapan',
            'id_pengaduan' => $request->id_pengaduan,
            'judul_pengaduan' => $pre[0]->judul,
            'type' => 'primary'

        ]);
        return response()->json([
            'title' => 'Tanggapan',
            'message' => 'berhasil dikirim',
            'type' => 'success'
        ]);
    }

    public function show(Request $request)
    {
        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->get();
        return $tanggapan[0]['isi'];
    }
}
