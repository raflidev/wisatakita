<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('login');
    }

    public function dashboard_user()
    {
        return view('dashboard.user.user_read');
    }


    public function daftar()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $customMessages = [
            'required' => ':attribute tidak boleh kosong.'
        ];

        $this->validate($request, $rules, $customMessages);


        if (Auth::attempt($request->only('username', 'password'))) {
            return back()->with('success', 'Login Berhasil');
        }

        return back()->withErrors([
            'wrong' => 'Username atau password anda salah',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.user_read');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'kota' => 'required',
            'notelp' => 'required',
            'username' => 'required|unique:users|min:4',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ];

        $customMessages = [
            'required' => ':attribute tidak boleh kosong.',
            'unique' => ':attribute sudah terdaftar.',
            'email' => ':attribute harus berupa email.',
            'min' => ':attribute minimal :min karakter.',
            'same' => ':attribute tidak sama dengan password.',
        ];

        $this->validate($request, $rules, $customMessages);
        $user = new User([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'kota' => $request->kota,
            'notelp' => $request->notelp,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        $user->save();
        return back()->with('success', 'Pendaftaran Berhasil, Silahkan Login');
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
        $data = User::find($id);
        return view('dashboard.user.user_edit', ['data' => $data]);
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
        $user = User::find($id);
        if (Hash::check($request->password, Auth::user()->password)) {
            $user->update([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'email' => $request->email,
                'kota' => $request->kota,
                'notelp' => $request->notelp,
                'username' => $request->username,
            ]);
            
            return redirect()->route('dashboard.user')->with('success', 'Data Berhasil Diubah');
        }else{
            
            return back()->withErrors([
                'wrong' => 'Password anda salah',
            ]);
        }
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
        return redirect()->route('dashboard.user')->with('success', 'Data Berhasil Dihapus');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login')->with('success', 'Berhasil Logout');
    }
}
