<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('trash_id');
            $table->unsignedBigInteger('admin_id');
            $table->integer('total_harga');
            $table->integer('jumlah');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('trash_id')->references('id')->on('trashes');
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
        Schema::dropIfExists('transactions');
    }
}
