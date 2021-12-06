<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKadepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kadep', function (Blueprint $table) {
            $table->char('nip_kadep',16)->primary();
            $table->string('nama_kadep');
            $table->string('alamat_kadep');
            $table->tinyInteger('jk_kadep');
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
        Schema::dropIfExists('kadep');
    }
}
