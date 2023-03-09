<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('trash_id');
            $table->unsignedBigInteger('collector_id');
            $table->unsignedBigInteger('admin_id');
            $table->bigInteger('total_harga');
            $table->bigInteger('jumlah');
            
            $table->foreign('trash_id')->references('id')->on('trashes');
            $table->foreign('collector_id')->references('id')->on('collectors');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->timestamp('tanggal')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
