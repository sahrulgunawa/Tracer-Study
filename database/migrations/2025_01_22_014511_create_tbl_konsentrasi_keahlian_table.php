<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKonsentrasiKeahlianTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_konsentrasi_keahlian', function (Blueprint $table) {
            $table->id('id_konsentrasi_keahlian');
            $table->unsignedBigInteger('id_program_keahlian');
            $table->string('kode_konsentrasi_keahlian', 10)->unique();
            $table->string('konsentrasi_keahlian', 100);
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('id_program_keahlian')
                  ->references('id_program_keahlian')  // kolom id_program_keahlian dari tabel tbl_program_keahlian
                  ->on('tbl_program_keahlian')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_konsentrasi_keahlian');
    }
}
