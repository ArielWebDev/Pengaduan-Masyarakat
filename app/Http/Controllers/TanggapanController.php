<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        try {
            $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
            $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();
        
            if ($tanggapan) {
                $pengaduan->update(['status' => $request->status]);
        
                $tanggapan->update([
                    'tgl_tanggapan' => date('Y-m-d'),
                    'tanggapan' => $request->tanggapan,
                    'id_user' => Auth::id(),
                ]);
        
                return redirect()->back()->with('status', 'Berhasil Di Kirim');
            } else {
                $pengaduan->update(['status' => $request->status]);
        
                $tanggapan = Tanggapan::create([
                    'id_pengaduan' => $request->id_pengaduan,
                    'tgl_tanggapan' => date('Y-m-d'),
                    'tanggapan' => $request->tanggapan,
                    'id_user' => Auth::id(),
                ]);
                return redirect()->back()->with('status', 'Berhasil Di Kirim');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'Terjadi Kesalahan: ' . $e->getMessage());
        }
        
    }

    
}
