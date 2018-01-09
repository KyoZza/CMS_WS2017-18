<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeHeaderOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_header_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('theme_id');                        
            $table->string('theme')->unique();
            $table->string('background_image');
            $table->string('title');
            $table->string('subtitle');
            $table->timestamps();
            $table->string('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_header_options');
    }
}
