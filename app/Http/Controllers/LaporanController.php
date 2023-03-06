<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function cetak($from, $to)
    {
        // dd(["Tanggal Awal : ".$from, "Tanggal Akhir : ".$to]);

        $pengaduan = DB::table('pengaduan')
        ->leftjoin('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
        ->join('masyarakat', 'pengaduan.id_masyarakat', '=', 'masyarakat.id')
        ->join('users', 'tanggapan.id_user', '=', 'users.id')
        ->select('pengaduan.*', 'tanggapan.*', 'masyarakat.name as name_masyarakat', 'users.name as name_petugas')
        ->whereBetween('tgl_pengaduan', [$from, $to])
        ->get();
        return view('admin.laporan.cetak', compact('pengaduan','from','to'));

    }

}
