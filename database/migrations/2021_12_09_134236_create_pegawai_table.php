<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->integer('ID_PEGAWAI')->primary();
            $table->integer('ID_JABATAN')->index('FK_MENJABAT');
            $table->string('NAMA_PEGAWAI', 50);
            $table->string('ALAMAT_PEGAWAI', 100);
            $table->date('TGL_LAHIR_PEGAWAI');
            $table->string('TELP_PEGAWAI', 12);
            $table->string('EMAIL_PEGAWAI', 50);
            $table->string('PASSWORD', 20);
            $table->boolean('STATUS_PEGAWAI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
