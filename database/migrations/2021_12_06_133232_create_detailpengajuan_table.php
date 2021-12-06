<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailpengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengajuan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengajuan');
            $table->unsignedBigInteger('id_sidang');
            $table->primary(['id_pengajuan', 'id_sidang']);
            $table->timestamps();
        });

        Schema::table('detail_pengajuan', function (Blueprint $table) {
            $table->foreign('id_pengajuan')->references('id_pengajuan')->on('pengajuan');
            $table->foreign('id_sidang')->references('id_sidang')->on('sidang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailpengajuan');
    }
}
