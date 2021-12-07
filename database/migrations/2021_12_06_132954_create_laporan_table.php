<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->char('nim_mhs',12);
            $table->string('nama_laporan');
            $table->smallInteger('jenis_laporan');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->foreign('nim_mhs')->references('nim_mhs')->on('mahasiswa');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
