<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kecamatan', function (Blueprint $table) {
            $table->foreign(['ID_KOTA'], 'FK_MEMILIKI')->references(['ID_KOTA'])->on('kota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kecamatan', function (Blueprint $table) {
            $table->dropForeign('FK_MEMILIKI');
        });
    }
}
