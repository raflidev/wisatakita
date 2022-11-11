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
        Schema::create('qrhistory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_wisata");
            $table->unsignedBigInteger("id_user");
            $table->timestamps();
        });

        Schema::table('qrhistory', function (Blueprint $table) {
            $table->foreign('id_wisata')->references('id')->on('wisata');
            $table->foreign('id_user')->references('id')->on('users');
        });

        DB::table('qrhistory')->insert([
            'id_wisata' => 1,
            'id_user' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('qrhistory')->insert([
            'id_wisata' => 2,
            'id_user' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('qrhistory')->insert([
            'id_wisata' => 3,
            'id_user' => 3,
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
        Schema::dropIfExists('qrhistory');
    }
};
