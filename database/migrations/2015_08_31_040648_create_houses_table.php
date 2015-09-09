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
            $table->string('title')->nullable();
            $table->boolean('type');            // 1,2
            $table->bigInteger('price');
            $table->tinyInteger('money_unit');
            $table->tinyInteger('category');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->tinyInteger('city');
            $table->tinyInteger('district');
            $table->tinyInteger('ward');
            $table->string('address')->nullable();
            $table->double('lat', 16, 6);       // FLOAT(10, 6)
            $table->double('lng', 16, 6);       // FLOAT(10, 6)
            $table->string('youtube')->nullable();
            $table->text('description')->nullable();
            $table->integer('m2');
            $table->string('road')->nullable();
            $table->tinyInteger('toilet');
            $table->tinyInteger('floors');
            $table->tinyInteger('direction');
            $table->tinyInteger('bedroom');
            $table->tinyInteger('kitchen');
            $table->tinyInteger('living_room');
            $table->tinyInteger('common_room');
            $table->tinyInteger('balcony');
            $table->tinyInteger('logia');
            $table->tinyInteger('license');
            $table->string('feature')->nullable();          // JSON
            $table->text('images')->nullable();             // JSON
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