<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->integer('ID_PEMBAYARAN')->primary();
            $table->integer('ID_PEMESANAN')->index('FK_MEMBAYAR');
            $table->integer('ID_PEGAWAI')->index('FK_KONFIRMASI_BAYAR');
            $table->date('TANGGAL_PEMBAYARAN');
            $table->boolean('STATUS_BAYAR');
            $table->binary('BUKTI_BAYAR')->nullable();
            $table->string('NO_REKENING', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
