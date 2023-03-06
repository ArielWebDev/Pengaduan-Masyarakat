<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('admin.masyarakat.index', compact('masyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect('masyarakat')->with('success', 'Data Masyarakat berhasil di simpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $masyarakat = Masyarakat::find($id);
        return view('admin.masyarakat.edit', compact('masyarakat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => ['required', 'numeric'],
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['nullable'],
            'tlpn' => ['required', 'numeric'],
        ]);

        try {
            // dd($request->all());
            $masyarakat = Masyarakat::find($id);
            $masyarakat->nik = $request->nik;
            $masyarakat->name = $request->name;
            $masyarakat->username = $request->username;
            if($request->password !=""){
                $masyarakat->password = Hash::make($request->password);
            }
            $masyarakat->tlpn = $request->tlpn;
            $masyarakat->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect('masyarakat')->with('success', 'Data Masyarakat berhasil di simpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masyarakat = Masyarakat::find($id);
        $masyarakat->delete();
         
         return redirect()->back()->with('success','Masyarakat berhasil dihapus');
    }
}
