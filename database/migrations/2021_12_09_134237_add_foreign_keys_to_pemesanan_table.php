<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->foreign(['NO_PELANGGAN'], 'FK_MEMESAN')->references(['NO_PELANGGAN'])->on('pelanggan');
            $table->foreign(['ID_PEGAWAI'], 'FK_MELAYANI')->references(['ID_PEGAWAI'])->on('pegawai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropForeign('FK_MEMESAN');
            $table->dropForeign('FK_MELAYANI');
        });
    }
}
