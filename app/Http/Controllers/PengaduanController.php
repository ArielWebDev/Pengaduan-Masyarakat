<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pengaduan = DB::table('pengaduan')
        ->leftjoin('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
        ->join('masyarakat', 'pengaduan.id_masyarakat', '=', 'masyarakat.id')
        ->join('users', 'tanggapan.id_user', '=', 'users.id')
        ->select('pengaduan.*', 'tanggapan.*', 'masyarakat.name as name_masyarakat', 'users.name as name_petugas')
        ->orderBy('tgl_pengaduan', 'desc')
        ->where('pengaduan.id_masyarakat', Auth::guard('masyarakat')->id())
        ->get();
             
        return view('user.pengaduan',compact('pengaduan'));
    }

    public function create()
    {
        $masyarakat = Masyarakat::all();
        return view('user.pengaduancreate', compact('masyarakat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi_pengaduan' => 'required',
            'foto' => 'required',
        ]);
        
        try {
            $pengaduan = new Pengaduan();
            $pengaduan->tgl_pengaduan = date('Y-m-d h:i:s');
            $pengaduan->id_masyarakat = Auth::guard('masyarakat')->user()->id;
            $pengaduan->isi_pengaduan = $request->isi_pengaduan;
            $pengaduan->status = '0';
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('foto-pengaduan/', $request->file('foto')->getClientOriginalName());
                $pengaduan->foto = $request->file('foto')->getClientOriginalName();
            }
            $pengaduan->save();
        } catch (\Exception $e)
        {
            dd($e->getMessage());
        }return redirect('pengaduan')->with('success', 'Pengaduan Berhasil di tambah');
        
    }

}
