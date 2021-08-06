<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang');
            $table->string('nama_skl');
            $table->string('tahun_mulai');
            $table->string('tahun_lulus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikans');
    }
}
