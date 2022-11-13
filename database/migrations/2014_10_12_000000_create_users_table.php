<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('notelp');
            $table->string('kota');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'nama_depan' => 'Rafli',
            'nama_belakang' => 'Ramadhan',
            'notelp' => '081234567890',
            'kota' => 'Bekasi',
            'email' => 'rafli@asd.com',
            'username' => 'raflidev',
            'password' => Hash::make('qwerty123'),
        ]);
        DB::table('users')->insert([
            'nama_depan' => 'Fadil',
            'nama_belakang' => 'Akbar',
            'notelp' => '081234567890',
            'kota' => 'Bogor',
            'email' => 'fadil@asd.com',
            'username' => 'fadilakbar',
            'password' => Hash::make('qwerty123'),
        ]);
        DB::table('users')->insert([
            'nama_depan' => 'Sien',
            'nama_belakang' => 'Salim',
            'notelp' => '081234567890',
            'kota' => 'Bontang',
            'email' => 'sien@asd.com',
            'username' => 'siensalim',
            'password' => Hash::make('qwerty123'),
        ]);
        DB::table('users')->insert([
            'nama_depan' => 'test',
            'nama_belakang' => 'test',
            'notelp' => '081234567890',
            'kota' => 'Bontang',
            'email' => 'test@asd.com',
            'username' => 'test',
            'password' => Hash::make('test'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
