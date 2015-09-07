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
            $table->boolean('type')->nullable();            // 1,2
            $table->smallInteger('price')->nullable();
            $table->tinyInteger('money_unit')->nullable();
            $table->tinyInteger('category')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->tinyInteger('city')->nullable();
            $table->tinyInteger('district')->nullable();
            $table->tinyInteger('ward')->nullable();
            $table->string('address')->nullable();
            $table->double('lat', 16, 6)->nullable();       // FLOAT(10, 6)
            $table->double('lng', 16, 6)->nullable();       // FLOAT(10, 6)
            $table->string('youtube')->nullable();
            $table->text('description')->nullable();
            $table->integer('m2')->nullable();
            $table->string('road')->nullable();
            $table->tinyInteger('toilet')->nullable();
            $table->tinyInteger('floors')->nullable();
            $table->tinyInteger('direction')->nullable();
            $table->tinyInteger('bedroom')->nullable();
            $table->tinyInteger('kitchen')->nullable();
            $table->tinyInteger('living_room')->nullable();
            $table->tinyInteger('common_room')->nullable();
            $table->tinyInteger('balcony')->nullable();
            $table->tinyInteger('logia')->nullable();
            $table->tinyInteger('license')->nullable();
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
