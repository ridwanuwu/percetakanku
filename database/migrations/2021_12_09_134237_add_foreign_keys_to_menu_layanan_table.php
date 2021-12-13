<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMenuLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_layanan', function (Blueprint $table) {
            $table->foreign(['ID_LAYANAN'], 'FK_TERDAPAT3')->references(['ID_LAYANAN'])->on('layanan');
            $table->foreign(['ID_UKURAN'], 'FK_TERDAPAT2')->references(['ID_UKURAN'])->on('ukuran');
            $table->foreign(['ID_BAHAN'], 'FK_TERMASUK')->references(['ID_BAHAN'])->on('bahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_layanan', function (Blueprint $table) {
            $table->dropForeign('FK_TERDAPAT3');
            $table->dropForeign('FK_TERDAPAT2');
            $table->dropForeign('FK_TERMASUK');
        });
    }
}
