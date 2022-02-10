<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Activity;
use App\Models\Admin;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{

    public function store(Request $request)
    {
        if (!isset($request->lampiran)) {
            return response()->json([
                'title' => 'Oops!',
                'message' => 'Mohon tambahkan lampiran',
                'type' => 'warning',
            ]);
        }

        $this->validate($request, [
            'nik' => 'required',
            'judul' => 'required|max:30',
            'tanggal' => 'required',
            'isi' => 'required|min:50',
            'wilayah' => 'required',
            'kategori' => 'required',
            'lampiran' => 'image|mimes:jpg,png,jpeg|max:4048'

        ]);
        $pengaduan = new Pengaduan();
        $pengaduan->nik = $request->nik;
        $pengaduan->judul = $request->judul;
        $pengaduan->tanggal = $request->tanggal;
        $pengaduan->isi = $request->isi;
        $pengaduan->wilayah = $request->wilayah;
        $pengaduan->kategori = $request->kategori;
        $namaLampiran = $request->judul . "_" . Str::random(4);
        $lampiran = $request->file('lampiran');
        $newLampiran = $namaLampiran . '.' . $lampiran->getClientOriginalExtension();
        $lampiran->move(public_path('img/lampiran'), $newLampiran);
        $pengaduan->lampiran = $newLampiran;
        $pengaduan->save();
        return response()->json([
            'title' => 'Lapor',
            'message' => 'Anda Berhasil Melaporkan',
            'type' => 'success',
        ]);
    }

    public function getMyLaporan($nik)
    {
        $mLaporan = Pengaduan::where('nik', $nik)->paginate(4);
        return $mLaporan;
    }

    public function getMyLaporanById($nik, $id)
    {
        $laporan = Pengaduan::where('id_pengaduan', $id)->get();
        return $laporan;
    }

    public function getPengaduanByLevel(Request $request)
    {
        $data =  Pengaduan::orderBy('created_at', 'desc')->get();
        return response()->json(['data' => $data]);
    }

    public function getPengaduanById(Request $request)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id)->get();
        return compact('pengaduan');
    }

    public function verifyPengaduan(Request $request)
    {

        Activity::create([
            'avatar' => Auth::user()->avatar,
            'username' => Auth::user()->username,
            'level' => Auth::user()->level,
            'act' => 'Memverifikasi Pengaduan'
        ]);
        Admin::where('id', $request->id_petugas)
            ->update([
                'act' => Auth::user()->act + 1
            ]);
        Pengaduan::where('id_pengaduan', $request->id)
            ->update([
                'status' => 'proses'
            ]);
        $pre = Pengaduan::where('id_pengaduan', $request->id)->get();
        Mail::create([
            'nik' => $pre[0]->nik,
            'nama_petugas' => Auth::user()->nama_petugas,
            'message' => 'Pengaduan Anda Telah diverifikasi, Mohon Tunggu Tanggapan dari Pengaduan Anda :)',
            'category' => 'Verifikasi',
            'id_pengaduan' => $request->id,
            'judul_pengaduan' => $pre[0]->judul,
            'type' => 'success'

        ]);
        return response()->json([
            'title' => 'Pengaduan',
            'message' => 'Berhasil Di verifikasi',
            'type' => 'success'
        ]);
    }

    public function print($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->get();
        if ($pengaduan[0]['status'] != '0' && Auth::user()->level == 'admin') {
            $data = $pengaduan[0];
            $by = User::where('nik', $data['nik'])->get();
            $user = $by[0];
            return view('admin.print', compact('data', 'user'));
        } else {
            return view('404');
        }
    }

    public function reject(Request $request)
    {
        $this->validate($request, [
            'isi' => 'required|min:20',
            'id_pengaduan' => 'required'
        ]);
        $pre = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->get();
        unlink('img/lampiran/' . $pre[0]->lampiran);
        Mail::create([
            'nik' => $pre[0]->nik,
            'nama_petugas' => Auth::user()->nama_petugas,
            'message' => $request->isi,
            'category' => 'Pengembalian Pengaduan',
            'id_pengaduan' => $request->id_pengaduan,
            'judul_pengaduan' => $pre[0]->judul,
            'type' => 'danger'

        ]);

        Pengaduan::where('id_pengaduan', $request->id_pengaduan)->delete();
        Activity::create([
            'avatar' => Auth::user()->avatar,
            'username' => Auth::user()->username,
            'level' => Auth::user()->level,
            'act' => 'Mengembalikan Pengaduan'
        ]);
        Admin::where('id', Auth::user()->id)->update([
            'act' => Auth::user()->act + 1
        ]);
        return response()->json([
            'title' => 'Pengaduan',
            'message' => 'Berhasil Dikembalikan',
            'type' => 'success'
        ]);
    }
}
