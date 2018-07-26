<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            $table->string('slug')->unique();
            $table->string('meta_title');
            $table->string('meta_description');

            $table->string('title');
            $table->text('description');
            $table->text('schedule');
            $table->text('location');
            $table->tinyInteger('category');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedSmallInteger('city');
            $table->unsignedSmallInteger('district');
            $table->unsignedSmallInteger('ward');
            $table->string('address');
            $table->double('lat', 16, 6);       // FLOAT(10, 6)
            $table->double('lng', 16, 6);       // FLOAT(10, 6)
            $table->string('youtube');
            $table->text('images');             // JSON
            $table->tinyInteger('is_approved');
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
        Schema::drop('projects');
    }
}
