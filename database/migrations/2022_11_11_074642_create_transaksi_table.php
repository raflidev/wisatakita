<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_wisata");
            $table->unsignedBigInteger("id_user");
            $table->integer("jumlah_tiket");
            $table->integer("total_harga");
            $table->string('metode_pembayaran');
            $table->timestamps();
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_wisata')->references('id')->on('wisata');
            $table->foreign('id_user')->references('id')->on('users');
        });

        DB::table('transaksi')->insert([
            'id_wisata' => 1,
            'id_user' => 1,
            'jumlah_tiket' => 2,
            'total_harga' => 20000,
            'metode_pembayaran' => 'DANA',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('transaksi')->insert([
            'id_wisata' => 2,
            'id_user' => 1,
            'jumlah_tiket' => 2,
            'total_harga' => 20000,
            'metode_pembayaran' => 'BRI',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('transaksi')->insert([
            'id_wisata' => 3,
            'id_user' => 1,
            'jumlah_tiket' => 2,
            'total_harga' => 20000,
            'metode_pembayaran' => 'GOPAY',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
