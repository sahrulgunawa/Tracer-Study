<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatusAlumniTable extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_status_alumni', function (Blueprint $table) {
            $table->id('id_status_alumni');
            $table->string('status', 25);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_status_alumni');
    }
}
