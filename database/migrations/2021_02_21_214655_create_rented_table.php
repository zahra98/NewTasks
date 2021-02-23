<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
class CreateRentedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('rented', function (Blueprint $table) {
            $start = Carbon::now();
            $current = Carbon::now();
            $dueDate = $current->addDays(3);
            $table->id();
            $table->string('status')-> default('pending');
            $table->date('startDate')-> default($start);
            $table->date('dueDate')-> default($dueDate);
            $table->bigInteger('renter_id')->unsigned();
            $table->bigInteger('rentedBook_id')->unsigned();
            $table->bigInteger('request_id')->unsigned();
            $table->bigInteger('owner_id');
         
        });

        Schema::table('rented', function( Blueprint $table) {
   
            $table->foreign('renter_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('rentedBook_id')
            ->references('id')
            ->on('books')
            ->onDelete('cascade');

            $table->foreign('request_id')
            ->references('id')
            ->on('requests')
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
        Schema::dropIfExists('rented');
    }
}
