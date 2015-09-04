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
            $table->integer('type')->unsigned();
            $table->string('price');
            $table->integer('money_unit')->unsigned();
            $table->integer('category')->unsigned();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('city')->unsigned();
            $table->integer('district')->unsigned();
            $table->integer('ward')->unsigned();
            $table->string('address');
            $table->integer('lat')->unsigned();
            $table->integer('lng')->unsigned();
            $table->string('youtube');
            $table->text('description');
            $table->text('m2');
            $table->text('road');
            $table->integer('toilet')->unsigned();
            $table->integer('floors')->unsigned();
            $table->integer('direction')->unsigned();
            $table->integer('bedroom')->unsigned();
            $table->integer('kitchen')->unsigned();
            $table->integer('living_room')->unsigned();
            $table->integer('common_room')->unsigned();
            $table->integer('balcony')->unsigned();
            $table->integer('logia')->unsigned();
            $table->integer('license')->unsigned();
            $table->string('feature');
            $table->text('images');
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
