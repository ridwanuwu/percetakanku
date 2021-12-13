<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->foreign(['ID_KELURAHAN'], 'FK_BERALAMAT')->references(['ID_KELURAHAN'])->on('kelurahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropForeign('FK_BERALAMAT');
        });
    }
}
