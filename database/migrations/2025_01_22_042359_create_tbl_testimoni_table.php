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
    Schema::create('tbl_testimoni', function (Blueprint $table) {
        $table->id('id_testimoni');
        $table->unsignedBigInteger('id_alumni');
        $table->longText('testimoni');
        $table->date('tgl_testimoni');
        $table->foreign('id_alumni')->references('id_alumni')->on('tbl_alumni')->onDelete('cascade');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('tbl_testimoni');
    }
};
