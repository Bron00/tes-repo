<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidang', function (Blueprint $table) {
            $table->id('id_sidang');
            $table->char('nip_dosen',16);
            $table->char('nim_mhs',12);
            $table->unsignedBigInteger('id_laporan');
            $table->date('waktu_sidang');
            $table->string('tempat_sidang');
            $table->tinyInteger('status_sidang');
            $table->timestamps();
        });

        Schema::table('sidang', function (Blueprint $table) {
            $table->foreign('nip_dosen')->references('nip_dosen')->on('dosen');
            $table->foreign('nim_mhs')->references('nim_mhs')->on('mahasiswa');
            $table->foreign('id_laporan')->references('id_laporan')->on('laporan');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sidang');
    }
}
