<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTahunLulusTable extends Migration
{
    public function up(): void
    {
        Schema::create('tb_tahun_lulus', function (Blueprint $table) {
            $table->id('id_tahun_lulus');
            $table->string('tahun_lulus', 50);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_tahun_lulus');
    }
}
