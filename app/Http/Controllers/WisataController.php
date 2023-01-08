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
        $data = Wisata::limit(4)->get();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.wisata.wisata_create');
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
            'nama_wisata' => 'required',
            'id_admin' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'max_tiket' => 'required',
            'tipe_wisata' => 'required',
        ]);

        $file = $request->file('gambar');
        $filename = uniqid() . "_" . $file->getClientOriginalName();
        $file->storeAs('public/', $filename);

        $wisata = new Wisata([
            'nama_wisata' => $request->nama_wisata,
            'id_admin' => $request->id_admin,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $filename,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'max_tiket' => $request->max_tiket,
            'tipe_wisata' => $request->tipe_wisata,
        ]);

        $wisata->save();
        return redirect()->route('dashboard.wisata')->with('success', 'Berhasil Membuat Wisata');
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
        $data = Wisata::find($id);
        return view('dashboard.wisata.wisata_edit', ['data' => $data]);
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
        $wisata = Wisata::find($id);
        if($request->gambar  != NULL){
            $file = $request->file('gambar');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/', $filename);

            $wisata->update([
                'nama_wisata' => $request->nama_wisata,
                'id_admin' => $request->id_admin,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'gambar' => $filename,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'max_tiket' => $request->max_tiket,
            ]);
        }else{
            $wisata->update([
                'nama_wisata' => $request->nama_wisata,
                'id_admin' => $request->id_admin,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'max_tiket' => $request->max_tiket,
            ]);
        }

        return redirect()->route('dashboard.wisata')->with('success', 'Berhasil Mengubah Wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = Wisata::find($id);
        unlink("storage/$wisata->gambar");
        $wisata->delete();
        return redirect()->route('dashboard.wisata')->with('success', 'Berhasil Menghapus Wisata');
    }
}
