<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->char('nim_mhs',12)->primary();
            $table->char('nip_dosen',16);
            $table->string('nama_mhs');
            $table->string('password');
            $table->date('tgl_lahir_mhs');
            $table->string('alamat_mhs');
            $table->tinyInteger('jk_mhs');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->foreign('nip_dosen')->references('nip_dosen')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
