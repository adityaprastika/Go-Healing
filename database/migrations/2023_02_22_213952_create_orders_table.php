<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('travel_id')->nullable();
            $table->foreign('travel_id')->references('id')->on('travel')->onDelete('restrict');
            $table->unsignedBigInteger('mobil_id')->nullable();
            $table->foreign('mobil_id')->references('id')->on('mobils')->onDelete('restrict');
            $table->unsignedBigInteger('wisata_id')->nullable();
            $table->foreign('wisata_id')->references('id')->on('wisatas')->onDelete('restrict');
            $table->string('tipe');
            $table->string('status');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('total');
            $table->date('tanggal_selesai')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
