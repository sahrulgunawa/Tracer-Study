<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSekolahTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_sekolah', function (Blueprint $table) {
            $table->id('id_sekolah');
            $table->string('npsn', 10);
            $table->string('nss', 20)->nullable();
            $table->string('nama_sekolah', 50);
            $table->string('alamat', 50)->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_sekolah');
    }
}
