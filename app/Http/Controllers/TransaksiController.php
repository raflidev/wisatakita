<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();
        return view('dashboard.transaksi.transaksi_read', ['data' => $data]);
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
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'id_wisata' => $request->wisataid,
            'id_user' => Auth::user()->id,
            'kode_tiket' => rand(0, 999999999),
            'jumlah_tiket' => $request->total,
            'total_harga' => $request->total * $request->harga,
            'metode_pembayaran' => $request->metode,
        ]);

        return redirect()->route('qr.home');
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
