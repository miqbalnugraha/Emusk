<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaranaDiujiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarana_diuji', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('identitas')->unique();
            $table->integer('user');
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('jenis_sarana');
            $table->foreign('jenis_sarana')->references('id_sarana')->on('jenis_sarana')->onDelete('cascade');
            $table->integer('operator');
            $table->foreign('operator')->references('id_operator')->on('operator')->onDelete('cascade');
            $table->integer('lokasi');
            $table->foreign('lokasi')->references('id_lokasi')->on('lokasi')->onDelete('cascade');
            $table->integer('wilayah');
            $table->foreign('wilayah')->references('id_wilayah')->on('wilayah')->onDelete('cascade');
            $table->enum('jenis_pengujian', ['Uji Berkala','Uji Pertama']);
            $table->date('tgl_pengujian')->nullable();
            $table->integer('status_uji');
            $table->foreign('status_uji')->references('id_status')->on('status_uji')->onDelete('cascade');
            $table->integer('keterangan')->nullable();
            $table->foreign('keterangan')->references('id_keterangan')->on('keterangan')->onDelete('cascade');
            $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sarana_diuji');
    }
}
