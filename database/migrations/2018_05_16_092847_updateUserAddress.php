<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char("jenis_kelamin", 2)->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("nama_depan", 20)->nullable();
            $table->string("nama_belakang", 20)->nullable();
            $table->string("nama_panggilan", 20)->nullable();
            $table->string("telp_hp", 20)->nullable();
            $table->text("alamat_1")->nullable();
            $table->text("alamat_2")->nullable();
            $table->string("kota", 50)->nullable();
            $table->string("kode_pos",10)->nullanle();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
