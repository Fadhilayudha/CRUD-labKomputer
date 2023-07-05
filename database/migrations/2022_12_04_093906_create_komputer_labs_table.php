<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomputerLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komputer_labs', function (Blueprint $table) {
            $table->id();
            $table->integer('no_komputer');
            $table->string('ruang_penempatan')->nullable(); //nullable karena data boleh tidak disi alias kosong
            $table->string('merk_komputer');
            $table->string('kondisi')->nullable();
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
        Schema::dropIfExists('komputer_labs');
    }
}
