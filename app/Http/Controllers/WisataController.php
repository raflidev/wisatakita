<?php

namespace App\Http\Controllers;

use App\Models\QRhistory;
use App\Models\Transaksi;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wisata::all();
        return view('home', ['data' => $data]);
    }

    public function detail($id)
    {
        $data = DB::table('wisata')->where('id', $id)->first();
        return view('detail', ['data' => $data]);
    }

    public function rekomendasi()
    {
        $data = Wisata::all();
        return view('rekomendasi', ['data' => $data]);
    }

    public function listWisata()
    {
        $data = Wisata::all();
        return view('list', ['data' => $data, 'wisata' => NULL]);
    }

    public function listWisataSearch($wisata)
    {
        $data =  DB::table('wisata')->where('nama_wisata', 'like', "%$wisata%")->orWhere('lokasi', 'like', "%$wisata%")->get();
        return view('list', ['data' => $data, 'wisata' => $wisata]);
    }

    public function transaksi(Request $request)
    {
        $transaksi = new Transaksi([
            'id_wisata' => $request->wisataid, 
            'id_user' => Auth::user()->id,
            'kode_tiket' => rand(0, 999999999),
            'jumlah_tiket' => $request->total,
            'total_harga' => $request->total * $request->harga,
            'metode_pembayaran' => $request->metode,
        ]);
        $transaksi->save();

        return redirect()->route('qr.home');
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
        //
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
}
