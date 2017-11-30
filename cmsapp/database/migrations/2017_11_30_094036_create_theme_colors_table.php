<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('standard');
            $table->string('light');
            $table->string('dark');
            $table->string('light_text')->default('#fff');
            $table->string('dark_text')->default('#000');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_colors');
    }
}
