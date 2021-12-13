<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pemesanan', function (Blueprint $table) {
            $table->foreign(['ID_MENU'], 'FK_TERDAPAT_2')->references(['ID_MENU'])->on('menu_layanan');
            $table->foreign(['ID_PEMESANAN'], 'FK_MEMPUNYAI')->references(['ID_PEMESANAN'])->on('pemesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pemesanan', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT_2');
            $table->dropForeign('FK_MEMPUNYAI');
        });
    }
}
