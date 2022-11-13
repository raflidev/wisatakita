<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //
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
            'email' => 'required',
            'kota' => 'required',
            'notelp' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ];

        $customMessages = [
            'required' => ':attribute tidak boleh kosong.'
        ];

        $this->validate($request, $rules, $customMessages);

        if ($request->password != $request->confirm_password) {
            return back()->withErrors([
                'wrong' => 'Password tidak sama',
            ]);
        }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login')->with('success', 'Berhasil Logout');
    }
}
