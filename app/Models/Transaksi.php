<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";
    protected $fillable = [
        'id_wisata',
        'kode_tiket',
        'id_user',
        'jumlah_tiket',
        'total_harga',
        'metode_pembayaran',
    ];
}
