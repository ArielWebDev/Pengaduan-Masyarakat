<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MasyarakatLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth-masyarakat.login');
    }
    public function register()
    {
        return view('auth-masyarakat.register');
    }
    public function actionlogin(Request $request)
    {
        // dd($request->all());

        try {
            $username = Masyarakat::where('username', $request->username)->first();
            $password = Hash::check($request->password, $username->password);
        
            if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect('pengaduan');
            } else {
                throw new Exception('Username atau password salah!');
            }
        
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function actionregister(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'unique:masyarakat', 'numeric'],
            'name' => ['required'],
            'username' => ['required','unique:masyarakat'],
            'password' => ['required'],
            'tlpn' => ['required', 'numeric'],
        ]);

        try {
            // dd($request->all());
            $masyarakat = new Masyarakat();
            $masyarakat->nik = $request->nik;
            $masyarakat->name = $request->name;
            $masyarakat->username = $request->username;
            $masyarakat->password = Hash::make($request->password);
            $masyarakat->tlpn = $request->tlpn;
            $masyarakat->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('masyarakat.login')->with('success', 'Data Masyarakat berhasil di simpan.');
    

        // dd($request->all());

        // try {
        //     //cek apakah nisn dan nama yg diinput ada di DB ?
        //     $masyarakat = Masyarakat::where([
        //         'username' => $request->username,
        //         'password' => $request->password,
        //     ])->first();
        //     if (!empty($masyarakat)) { //klo ada masuk sni
        //         Session::put('is_masyarakat', 1);
        //         Auth::guard('masyarakat')->login($masyarakat);

        //         return redirect('frontend');
        //     } else { // klo g, gagal login
        //         return redirect()->to('/masyarakat/login')->withErrors(['error' => 'Username tidak ditemukan pada record !']);
        //     }
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
