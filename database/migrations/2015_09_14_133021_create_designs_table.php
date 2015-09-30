<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->tinyInteger('type');
            $table->tinyInteger('category');
            $table->string('designer');
            $table->string('interior_designer');
            $table->string('supervisor');
            $table->string('year');
            $table->string('m2');
            $table->string('build_m2');
            $table->string('floors');
            $table->string('frontage');
            $table->tinyInteger('city');
            $table->tinyInteger('district');
            $table->tinyInteger('ward');
            $table->string('address');
            $table->double('lat', 16, 6);       // FLOAT(10, 6)
            $table->double('lng', 16, 6);       // FLOAT(10, 6)
            $table->string('youtube');
            $table->text('images');             // JSON
            $table->text('description');
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
        Schema::drop('designs');
    }
}
