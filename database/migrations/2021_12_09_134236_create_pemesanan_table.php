<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('ID_PEMESANAN')->primary();
            $table->integer('ID_PEGAWAI')->index('FK_MELAYANI');
            $table->integer('NO_PELANGGAN')->index('FK_MEMESAN');
            $table->string('ALAMAT_KIRIM', 50)->nullable();
            $table->date('TANGGAL_PEMESANAN');
            $table->boolean('METODE_PEMBAYARAN');
            $table->double('DP_PEMESANAN')->nullable();
            $table->double('TOTAL_PEMESANAN')->nullable();
            $table->string('KETERANGAN_PEMESANAN', 100)->nullable();
            $table->boolean('STATUS_PEMESANAN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
