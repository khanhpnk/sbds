<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->integer('category')->unsigned();
            $table->string('price');
            $table->integer('type')->unsigned();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('city')->unsigned();
            $table->integer('district')->unsigned();
            $table->integer('ward')->unsigned();
            $table->string('address');
            $table->text('images');
            $table->string('youtube');
            $table->text('description');

            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
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
        Schema::drop('houses');
    }
}
