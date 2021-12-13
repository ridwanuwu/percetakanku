<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->integer('ID_PEMESANAN');
            $table->integer('ID_MENU')->index('FK_TERDAPAT_2');
            $table->integer('ID_DETAIL_PESAN');
            $table->integer('QTY');
            $table->integer('JUMLAHHALAMAN');
            $table->binary('DESAIN');
            $table->double('HARGABAYAR')->nullable();
            $table->string('KETERANGANDETAIL', 100)->nullable();

            $table->primary(['ID_PEMESANAN', 'ID_MENU', 'ID_DETAIL_PESAN']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pemesanan');
    }
}
