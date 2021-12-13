<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->integer('NO_PELANGGAN')->primary();
            $table->integer('ID_KELURAHAN')->index('FK_BERALAMAT');
            $table->string('NAMA_PELANGGAN', 50);
            $table->string('ALAMAT_PELANGGAN', 120);
            $table->string('NOMOR_PELANGGAN', 12);
            $table->string('EMAIL_PELANGGAN', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
}
