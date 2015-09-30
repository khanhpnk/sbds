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

            $table->string('slug')->unique();
            $table->string('meta_title');
            $table->string('meta_description');

            $table->string('title');
            $table->string('address');
            $table->string('road');
            $table->string('youtube');
            $table->text('description');
            $table->double('lat', 16, 6);       // FLOAT(10, 6)
            $table->double('lng', 16, 6);       // FLOAT(10, 6)
            $table->bigInteger('price');
            $table->integer('m2');
            $table->tinyInteger('money_unit');
            $table->tinyInteger('category');
            $table->tinyInteger('city');
            $table->tinyInteger('district');
            $table->tinyInteger('ward');
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
            $table->boolean('is_owner');           // 0 owner ,1 agency
            $table->boolean('is_sale');            // 0 sale, 1 rent
            $table->boolean('is_sold');            // 0 unsold, 1 sold

            $table->date('start_date');
            $table->date('end_date');
            $table->string('feature');          // JSON
            $table->text('images');             // JSON

            $table->timestamps();
			/*
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
			*/
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
