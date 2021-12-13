<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->foreign(['ID_PEMESANAN'], 'FK_MEMBAYAR')->references(['ID_PEMESANAN'])->on('pemesanan');
            $table->foreign(['ID_PEGAWAI'], 'FK_KONFIRMASI_BAYAR')->references(['ID_PEGAWAI'])->on('pegawai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign('FK_MEMBAYAR');
            $table->dropForeign('FK_KONFIRMASI_BAYAR');
        });
    }
}
