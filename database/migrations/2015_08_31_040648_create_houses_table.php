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
            $table->integer('type');
            $table->string('price');
            $table->integer('money_unit');
            $table->integer('category');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('city');
            $table->integer('district');
            $table->integer('ward');
            $table->string('address');
            $table->integer('lat');
            $table->integer('lng');
            $table->string('youtube');
            $table->text('description');
            $table->text('m2');
            $table->text('road');
            $table->integer('toilet');
            $table->integer('floors');
            $table->integer('direction');
            $table->integer('bedroom');
            $table->integer('kitchen');
            $table->integer('living_room');
            $table->integer('common_room');
            $table->integer('balcony');
            $table->integer('logia');
            $table->integer('license');
            $table->string('feature');
            $table->string('images', 1024);
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
