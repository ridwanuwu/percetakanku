<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_layanan', function (Blueprint $table) {
            $table->integer('ID_MENU')->primary();
            $table->integer('ID_UKURAN')->index('FK_TERDAPAT2');
            $table->integer('ID_LAYANAN')->index('FK_TERDAPAT3');
            $table->integer('ID_BAHAN')->index('FK_TERMASUK');
            $table->string('NAMA_MENU', 50);
            $table->double('HARGA_MENU');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_layanan');
    }
}
