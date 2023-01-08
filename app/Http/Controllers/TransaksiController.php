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
        $data = Transaksi::join('wisata', 'wisata.id', '=', 'transaksi.id_wisata')
            ->select('transaksi.*', 'wisata.nama_wisata', 'transaksi.created_at as tanggal')
            ->where('transaksi.id_user', Auth::user()->id)
            ->get();
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
        $data = Transaksi::find($id);
        return view('dashboard.transaksi.transaksi_read', ['data' => $data]);
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
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        
    }
}
