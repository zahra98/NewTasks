<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('auther')->nullable();
            $table->string('catagory')->nullable();
            $table->string('ispn', 15)->unique();
            $table->integer('copies');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

        });

        Schema::table('books', function( Blueprint $table) {
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
        Schema::dropIfExists('books');
    }
}
