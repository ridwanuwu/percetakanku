<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kota', function (Blueprint $table) {
            $table->foreign(['ID_PROVINSI'], 'FK_MEMILIKI_2')->references(['ID_PROVINSI'])->on('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kota', function (Blueprint $table) {
            $table->dropForeign('FK_MEMILIKI_2');
        });
    }
}
