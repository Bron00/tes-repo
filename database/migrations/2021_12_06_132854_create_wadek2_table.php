<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWadek2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wadek2', function (Blueprint $table) {
            $table->char('nip_wadek2',16)->primary();
            $table->string('nama_wadek2');
            $table->string('alamat_wadek2');
            $table->tinyInteger('jk_wadek2');
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
        Schema::dropIfExists('wadek2');
    }
}
