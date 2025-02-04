<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_program_keahlian', function (Blueprint $table) {
            $table->id('id_program_keahlian');
            $table->unsignedBigInteger('id_bidang_keahlian');
            $table->string('kode_program_keahlian', 10);
            $table->string('program_keahlian', 100);
            $table->timestamps();
    
            $table->foreign('id_bidang_keahlian')->references('id_bidang_keahlian')->on('tbl_bidang_keahlian')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_program_keahlian');
    }
};