<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'username' => ['required','unique:users'],
            'name' => ['required'],
            'password' => ['required'],
            'tlpn' => ['required', 'numeric'],
            'level' => ['required'],
        ]);

        try {
            // dd($request->all());
            $user = new User();
            $user->username = $request->username;
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->tlpn = $request->tlpn;
            $user->level = $request->level;
            $user->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect('user')->with('success', 'Data Petugas berhasil di simpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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
            'username' => ['required'],
            'name' => ['required'],
            'password' => ['nullable'],
            'tlpn' => ['required', 'numeric'],
            'level' => ['required'],
        ]);

        try {
            // dd($request->all());
            $user = User::find($id);
            $user->username = $request->username;
            $user->name = $request->name;
            if($request->password !=""){
                $user->password = Hash::make($request->password);
            }
            $user->tlpn = $request->tlpn;
            $user->level = $request->level;
            $user->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect('user')->with('success', 'Data Petugas berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
         
         return redirect()->back()->with('success','User berhasil dihapus');
    }
}
