<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = "wisata";

    protected $fillable = [
        'nama_wisata',
        'id_admin',
        'lokasi',
        'deskripsi',
        'harga',
        'gambar',
        'jam_buka',
        'jam_tutup',
        'max_tiket',
        'tipe_wisata',
    ];
}
