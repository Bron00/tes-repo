<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->char('nip_paa',16);
            $table->char('nip_dosen',16);
            $table->char('nip_kps',16);
            $table->char('nip_kadep',16);
            $table->char('nip_wadek2',16);
            $table->tinyInteger('status_pengajuan');
            $table->tinyInteger('acc_kps');
            $table->tinyInteger('acc_kadep');
            $table->tinyInteger('acc_wadek2');
            $table->timestamps();
        });

        Schema::table('pengajuan', function (Blueprint $table) {
            $table->foreign('nip_paa')->references('nip_paa')->on('paa');
            $table->foreign('nip_dosen')->references('nip_dosen')->on('dosen');
            $table->foreign('nip_kps')->references('nip_kps')->on('kps');
            $table->foreign('nip_kadep')->references('nip_kadep')->on('kadep');
            $table->foreign('nip_wadek2')->references('nip_wadek2')->on('wadek2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
}
