<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            //
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->double('balance');
            $table->timestamps();
        });

        Schema::table('payment', function( Blueprint $table) {
            $table->foreign('user_id')
            ->references ('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            //
        });
    }
}
