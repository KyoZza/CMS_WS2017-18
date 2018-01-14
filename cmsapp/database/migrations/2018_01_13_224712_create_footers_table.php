<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theme');
            $table->mediumText('about_en');
            $table->mediumText('about_de');
            $table->mediumText('address_en');
            $table->mediumText('address_de');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('linkedin');
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
        Schema::dropIfExists('footers');
    }
}
