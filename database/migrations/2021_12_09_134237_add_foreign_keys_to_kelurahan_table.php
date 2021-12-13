<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelurahan', function (Blueprint $table) {
            $table->foreign(['ID_KECAMATAN'], 'FK_TERDAPAT')->references(['ID_KECAMATAN'])->on('kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelurahan', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT');
        });
    }
}
