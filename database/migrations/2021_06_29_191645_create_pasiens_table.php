<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('kode');
            $table->string('nik');
            $table->date('tgl_lahir');
            $table->string('no_hp');
            $table->string('nama');
            $table->string('vaksin_ke');
            $table->text('alamat');
            $table->string('jenis_kelamin');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('keluarga_besar_tni');
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
        Schema::dropIfExists('pasiens');
    }
}
