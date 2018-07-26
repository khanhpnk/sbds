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
            $table->integer('company_id')->unsigned();
            $table->tinyInteger('category');
            $table->tinyInteger('sub_category');

            $table->string('slug')->unique();
            $table->string('meta_title');
            $table->string('meta_description');

            $table->string('title');
            $table->string('designers');
            $table->string('designers_furniture');
            $table->string('supervisor');
            $table->string('year');
            $table->string('land_m2');
            $table->string('build_m2');
            $table->string('number_of_floors');
            $table->string('frontage_m2');
            $table->unsignedSmallInteger('city');
            $table->unsignedSmallInteger('district');
            $table->unsignedSmallInteger('ward');
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
