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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string("username")->unique();
            $table->string("password");
            $table->string("name");
            $table->integer("role");
            $table->timestamps();
        });

        DB::table('admin')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'name' => 'Admin',
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('admin')->insert([
            'username' => 'admin2',
            'password' => Hash::make('admin2'),
            'name' => 'Admin',
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('admin')->insert([
            'username' => 'admin3',
            'password' => Hash::make('admin3'),
            'name' => 'Admin',
            'role' => 2,
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
        Schema::dropIfExists('admin');
    }
};
