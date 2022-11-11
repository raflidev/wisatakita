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
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin');
            $table->string("nama_wisata");
            $table->string("lokasi");
            $table->string("deskripsi");
            $table->string("gambar");
            $table->integer("harga");
            $table->string("jam_buka");
            $table->string("jam_tutup");
            $table->integer("tipe_wisata");
            $table->timestamps();
        });

        Schema::table('wisata', function (Blueprint $table) {
            $table->foreign('id_admin')->references('id')->on('admin');
        });

        DB::table('wisata')->insert([
            "nama_wisata" => "Wisata Alam",
            "lokasi" => "Cisarua, Bandung",
            "deskripsi" => "loremipsum21",
            "gambar" => "1.png",
            "harga" => 10000,
            "jam_buka" => "08:00",
            "jam_tutup" => "17:00",
            "tipe_wisata" => 1,
            "id_admin" => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('wisata')->insert([
            "nama_wisata" => "Pantai Beras Basah",
            "lokasi" => "Bontang Baru, Bontang",
            "deskripsi" => "loremipsum21",
            "gambar" => "1.png",
            "harga" => 20000,
            "jam_buka" => "05:00",
            "jam_tutup" => "22:00",
            "tipe_wisata" => 1,
            "id_admin" => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('wisata')->insert([
            "nama_wisata" => "Puncak Bogor",
            "lokasi" => "Cisarua, Bogor",
            "deskripsi" => "loremipsum21",
            "gambar" => "1.png",
            "harga" => 30000,
            "jam_buka" => "08:00",
            "jam_tutup" => "17:00",
            "tipe_wisata" => 1,
            "id_admin" => 2,
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
        Schema::dropIfExists('wisata');
    }
};
